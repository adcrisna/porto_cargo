<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Repository;
use App\Models\IccRate;
use App\Models\Transactions;
use App\Models\Claims;
use Carbon\Carbon;
use Auth;

class ClaimController extends Controller
{
    function newClaim() {

        $order = Orders::where('user_id', Auth::user()->id);
        $data = $order->with('transaction')->whereHas('transaction', function ($query) {
            $query->where('payment_status', 'paid');
        })->get();
        return view('Frontend.claim.new_claim', compact('data'));
    }
    function formClaim($id) {
        $order = Orders::where('id', $id)->with('transaction')->first();
        return view('Frontend.claim.form_claim', compact('order'));
    }

    function postClaim( Request $request) {
        try {
            // return $request->all();

            $f_pd = [];
            foreach ($request->file('photosOfDamage') as $key => $file) {
                $f_pd[$key] = [
                    'file_path' => $this->processFile($file)
                ];
            }

            $f_pou = [];
            foreach ($request->file('photosOfUnloading') as $key => $file) {
                $f_pou[$key] = [
                    'file_path' => $this->processFile($file)
                ];
            }

            $invoce_file = $this->processFile($request->file('invoice'));
            $travel_file = $this->processFile($request->file('travelPermissionLetter'));
            $bol_file = $this->processFile($request->file('billOfLanding'));
            $air_file = $this->processFile($request->file('airwayBill'));
            $pir_file = $this->processFile($request->file('policeInvestiReport'));
            $packing_file = $this->processFile($request->file('packingList'));

            DB::beginTransaction();
            $claim = new Claims();
            $claim->transaction_id  = $request->transaction_id;
            $claim->user_id  = Auth::user()->id;
            $claim->claim_conveyance = $request->claim_conveyance;
            $claim->chronology = $request->chronology;
            $claim->date_of_loss = $request->dateOfLoss;
            $claim->amount_of_loss = $request->ammountOfLoss;
            $claim->invoice = $invoce_file;
            $claim->police_investigation_report = $pir_file;
            $claim->packing_list = $packing_file;
            $claim->bill_of_lading = $bol_file;
            $claim->travel_permission_letter = $travel_file;
            $claim->airway_bill = $air_file;
            $claim->photos_of_damaged_items = $f_pd;
            $claim->photos_of_unloading_process = $f_pou;
            $claim->claim_status = 'submited';
            // return $claim;

            $claim->save();
            DB::commit();

            return redirect()->route('claim.submitted')->with('info', 'Claim Successfully send!.');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

    }


    function processFile($file)
{
    if (!empty($file)) {
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $newFileName = date('Ymd'). '_' . rand() . '_' . $originalName;
        $imagePath = $file->storeAs('claim_file', $newFileName, 'public');
        return asset('storage/' . $imagePath);
    }

    return null;
}

    function submittedClaim() {

        $data = Claims::where('user_id', Auth::user()->id)->where('claim_status','submited')->get();
        return view('Frontend.claim.submitted_claim' , compact('data'));
    }

    function submittedDetail() {
        return view('Frontend.claim.detail_submitted');
    }

    function closedClaim() {
        $data = Claims::where('user_id', Auth::user()->id)->where('claim_status','!=','submited')->get();
        return view('Frontend.claim.closed_claim', compact('data'));
    }
}
