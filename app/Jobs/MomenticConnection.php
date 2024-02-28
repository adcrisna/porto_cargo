<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;
use GuzzleHttp\Client;
use Auth,Str,Storage;
use App\Models\User;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Repository;
use App\Models\IccRate;
use App\Models\Transactions;
use App\Models\Claims;

class MomenticConnection implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    
    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

            $order = Orders::find($this->data);
            Log::alert("SEND MOMENTIC CONNECTION_JOBS_ORDER_ID ".$order->id);
            $icc_type = ucfirst($order->product->rate['icc_'.strtolower($order->coverage)]['premium_type']);
            $icc_premi = strval($order->product->rate['icc_'.strtolower($order->coverage)]['premium_value']);
            $wording = $order->product->rate['icc_'.strtolower($order->coverage)]['detail'];

            $product_code = $order->product->project_product_id;

            switch ($product_code) {
                case $product_code == "imjd37":
                    $sales_product = "FONI LINGGA JAYA";
                break;

                case $product_code == "yyw738":
                    $sales_product = "FONI LINGGA JAYA";
                break;

                case $product_code == "j5ui39":
                    $sales_product = "MEGA DAMAIYANTI";
                break;

                case $product_code == "7ion42":
                    $sales_product = "LINGGA FEBRIAN";
                break;

                default:
                    $sales_product = null;
            }

            if ($order->product->project_product_id == "imjd37" || $order->product->project_product_id == "yyw738") {
                $periode = floor((strtotime($order->estimated_time_of_arrival) - strtotime($order->estimated_time_of_departure)) / (60 * 60 * 24));
                $data['periode'] = $periode;
                $data['branch'] = "34";
                $data['branch_id'] = "34";
                $data['product_code'] =  $order->product->project_product_id;
                $data['inforce_date'] = substr($order->estimated_time_of_arrival, 0, 10);
                $data['periode_start'] = substr($order->estimated_time_of_arrival, 0, 10);
                $data['broker'] = !empty($order->product->bf) ?  floatval($order->product->bf) : null;
                $data['policy_number'] = $order->transaction->policy_number;
                
                
                $data['additional_data']['usersdata']['name'] = $order->user->name;
                $data['additional_data']['usersdata']['phone'] = $order->user->phone_number;
                $data['additional_data']['usersdata']['email'] = $order->user->email;
                $data['additional_data']['usersdata']['type'] = $order->user->type;
                $data['additional_data']['usersdata']['address'] = $order->insured_address;
                
                $data['additional_data']['application'][24] = "CARGO"; // cob
                $data['additional_data']['application'][25] = "NEW"; // contract type
                $data['additional_data']['application'][27] = $order->currency; // currency
                $data['additional_data']['application'][31] = $wording; // wording
                $data['additional_data']['application'][32] = "INSTITUTE CARGO CLAUSE A"; // coverage
                $data['additional_data']['application'][38] = $order->product->deductibles; // flood zone
                $data['additional_data']['application'][41] = $order->transaction->payment_date; // premium payment
                $data['additional_data']['application'][47] = !empty($order->ship_name) ? $order->ship_name : $order->aircraft_name; // vessel name
                $data['additional_data']['application'][52] = $order->airway_bill; // air bill waybill
                $data['additional_data']['application'][53] = $order->invoice_number; // invoce number
                $data['additional_data']['application'][54] = $order->point_of_origin; // voyge from
                $data['additional_data']['application'][55] = $order->point_of_destination; // voyge to
                $data['additional_data']['application'][80] = "CORPORATE"; // division
                $data['additional_data']['application'][81] = "INDUSTRIAL &amp; COMMERCIAL"; // segment
                $data['additional_data']['application'][87] = $order->classified; // vessel classification
                $data['additional_data']['application'][88] = $wording; // caluse cargo
                $data['additional_data']['application'][96] = $order->item_description; // description
                $data['additional_data']['application'][295] = $sales_product; // sales

                $data['additional_data']['bf'][0]['type'] = "Percent";
                $data['additional_data']['bf'][0]['amount'] = !empty($order->product->bf) ? $order->product->bf : 0;
                
                $data['additional_data']['object'][0]['data'][263]['values'] = $order->point_of_origin. " - " .$order->point_of_destination;
                $data['additional_data']['object'][0]['data'][275]['values'] = $order->user->name;
                $data['additional_data']['object'][0]['data'][278]['values'] = $order->invoice_number;

                $data['additional_data']['object'][0]['insured'] = $order->sum_insured;
                $data['additional_data']['object'][0]['start_date'] = substr($order->estimated_time_of_departure, 0, 10);
                $data['additional_data']['object'][0]['end_date'] = substr($order->estimated_time_of_arrival, 0, 10);


                
                if (isset($order->product->additional_cost) && is_array($order->product->additional_cost) && count($order->product->additional_cost) > 0) {
                    $refactored_additional_cost = [];
                    foreach ($order->product->additional_cost as $additional_cost) {
                        $refactored_cost = [
                            'name' => $additional_cost['name'],
                            'cost' => strval(floatval($additional_cost['value'])/$order->rate_currency)
                        ];
                        $refactored_additional_cost[] = $refactored_cost;
                    }
                    $data['additional_data']['additional_cost'] = $refactored_additional_cost;
                } else {
                    $data['additional_data']['additional_cost'] = [
                        [
                            'name' => '0',
                            'cost' => '0'
                        ]
                    ];
                }

                $data['additional_data']['peril'][1]["id"] = "191";
                $data['additional_data']['peril'][1]["limit"] = "";
                $data['additional_data']['peril'][1]["value"] = $icc_premi;
                $data['additional_data']['peril'][1]["type"] = $icc_type;
                $data['additional_data']['peril'][1]["discount"] = $order->product->discount;
                $data['additional_data']['peril'][1]["type_brokerage"] ="Percent";
                $data['additional_data']['peril'][1]["broker"] = $order->product->bf;
                

                $data['additional_data']['co_insur'][0]["client_id"] = 19;
                $data['additional_data']['co_insur'][0]["rate"] = 100;
                $data['additional_data']['co_insur'][0]["type"] = "leader";
                $data['additional_data']['co_broking'] = null;
            }else{
                $periode = floor((strtotime($order->estimated_time_of_arrival) - strtotime($order->estimated_time_of_departure)) / (60 * 60 * 24));
                $data['periode'] = $periode;
                $data['product_code'] =  $order->product->project_product_id;
                $data['inforce_date'] = substr($order->estimated_time_of_arrival, 0, 10);
                $data['periode_start'] = substr($order->estimated_time_of_arrival, 0, 10);
                $data['broker'] = !empty($order->product->bf) ?  floatval($order->product->bf) : null;
                $data['policy_number'] = $order->transaction->policy_number;
                
                
                $data['additional_data']['usersdata']['name'] = $order->user->name;
                $data['additional_data']['usersdata']['phone'] = $order->user->phone_number;
                $data['additional_data']['usersdata']['email'] = $order->user->email;
                $data['additional_data']['usersdata']['type'] = $order->user->type;

                $data['additional_data']['application'][24] = "CARGO"; // cob
                $data['additional_data']['application'][25] = "NEW"; // cob
                $data['additional_data']['application'][27] = $order->currency; // currency
                $data['additional_data']['application'][31] = $wording; // wording
                $data['additional_data']['application'][32] = "INSTITUTE CARGO CLAUSE A"; // coverage
                $data['additional_data']['application'][38] = $order->product->deductibles; // flood zone
                $data['additional_data']['application'][41] = $order->transaction->payment_date; // premium payment
                $data['additional_data']['application'][47] = !empty($order->ship_name) ? $order->ship_name : $order->aircraft_name; // vessel name
                $data['additional_data']['application'][52] = $order->airway_bill; // air bill waybill
                $data['additional_data']['application'][53] = $order->invoice_number; // invoce number
                $data['additional_data']['application'][54] = $order->point_of_origin; // voyge from
                $data['additional_data']['application'][55] = $order->point_of_destination; // voyge to
                $data['additional_data']['application'][80] = "CORPORATE"; // division
                $data['additional_data']['application'][81] = "INDUSTRIAL &amp; COMMERCIAL"; // segment
                $data['additional_data']['application'][87] = $order->classified; // vessel classification
                $data['additional_data']['application'][96] = $order->item_description; // description
                if ($order->product->project_product_id == "j5ui39") {
                    $data['branch'] = "34";
                    $data['branch_id'] = "34";
                    $data['additional_data']['application'][295] = $sales_product; // sales
                }
                else{
                    $data['branch'] = "40";
                    $data['branch_id'] = "40";
                    $data['additional_data']['application'][295] = $sales_product; // sales
                }


                $data['additional_data']['bf'][0]['type'] = "Percent";
                $data['additional_data']['bf'][0]['amount'] = !empty($order->product->bf) ? $order->product->bf : 0;
                $data['additional_data']['object'][0]['data'][263]['values'] = $order->point_of_origin. " - " .$order->point_of_destination;
                $data['additional_data']['object'][0]['data'][275]['values'] = $order->user->name;
                $data['additional_data']['object'][0]['data'][278]['values'] = $order->invoice_number;

                $data['additional_data']['object'][0]['insured'] = $order->sum_insured;
                $data['additional_data']['object'][0]['start_date'] = substr($order->estimated_time_of_departure, 0, 10);
                $data['additional_data']['object'][0]['end_date'] = substr($order->estimated_time_of_arrival, 0, 10);


                
                if (isset($order->product->additional_cost) && is_array($order->product->additional_cost) && count($order->product->additional_cost) > 0) {
                    $refactored_additional_cost = [];
                    foreach ($order->product->additional_cost as $additional_cost) {
                        $refactored_cost = [
                            'name' => $additional_cost['name'],
                            'cost' => strval(floatval($additional_cost['value'])/$order->rate_currency)
                        ];
                        $refactored_additional_cost[] = $refactored_cost;
                    }
                    $data['additional_data']['additional_cost'] = $refactored_additional_cost;
                } else {
                    $data['additional_data']['additional_cost'] = [
                        [
                            'name' => '0',
                            'cost' => '0'
                        ]
                    ];
                }
                
                $data['additional_data']['peril'][1]["id"] = "191";
                $data['additional_data']['peril'][1]["limit"] = "";
                $data['additional_data']['peril'][1]["value"] = $icc_premi;
                $data['additional_data']['peril'][1]["type"] = $icc_type;
                $data['additional_data']['peril'][1]["discount"] = $order->product->discount;
                $data['additional_data']['peril'][1]["type_brokerage"] ="Percent";
                $data['additional_data']['peril'][1]["broker"] = $order->product->bf;
                
                
                $data['additional_data']['co_insur'][0]["client_id"] = 13;
                $data['additional_data']['co_insur'][0]["rate"] = 100;
                $data['additional_data']['co_insur'][0]["type"] = "leader";
                $data['additional_data']['co_broking'] = null;
            }

            $headers = [
                'Content-Type' => 'Application/Json',
                'product-key' => strval($order->product->product_key),
                'project-key' => strval($order->product->project_key),
                'authorization' => env('AUTH_SEPC_APP')
            ];

            $client = new Client();

            $res = $client->POST(env('API_SPECTRUM_URL').'/api/v1/spectrum/general-api',
            [
                'verify' => false,
                'headers' => $headers,
                'body' => json_encode($data, true),
            ]);
            
            if (json_decode($res->getBody(), true)['status'] == "success"){
                $order->transaction->contract_id = json_decode($res->getBody(), true)['contract_id'];
                Log::alert("SEND MOMENTIC CONNECTION_JOBS_SUCCESS_NEW_CONTRACT_ID ".json_decode($res->getBody(), true)['contract_id']);
            }
            $order->transaction->momentic_log = json_decode($res->getBody(), true);
            $order->transaction->save();

    }
}
