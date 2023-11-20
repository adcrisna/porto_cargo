<?php

namespace App\Http\Controllers\Auth;

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


class LoginController extends Controller
{
    public function login() {
        return view('auth.login');
    }
    public function register() {
        return view('auth.register');
    }
    public function waitVerif() {
        return view('auth.waiting_verif');
    }



    public function postlogin(Request $request) {
        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('quote.index');
        }
        return redirect()->route('auth.login')->with('error', 'Username and password does not match!');
    }

    public function postregister(Request $request) {
        try {
            DB::beginTransaction();
            $this->validate($request, [
                'name' => 'required|min:4',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8'
            ]);

            $user = new User;
            $user->name = $request->name;
            $user->email = strtolower($request->email);
            $user->password = bcrypt($request->password);
            $request->is_verify == '0' ? $user->status = '1' : $user->status = '0';
            $request->is_verify == '0' ? $user->account_type = 'retail' : $user->account_type = 'verify';
            $user->type =  $request->nametype;
            $user->phone_number =  $request->phone_number;
            // return $user;
            $user->save();

            DB::commit();
            return redirect()->route('auth.login')->with('info', 'Resgistration Successfully!.');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    function logout() {
        auth()->logout();
        return redirect()->route('auth.login')->with('info', 'Logout Successfully!.');
    }

}
