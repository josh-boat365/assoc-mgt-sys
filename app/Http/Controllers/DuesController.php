<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DuesController extends Controller
{
    protected $pk = 'pk_test_922d3fd3b930d333716fb93796521ed111839d77';

    public function pay_view()
    {
        $ps_pk = $this->pk;

        // dd($ps_pk);

        return view('user.dues-payment', compact(['ps_pk']));
    }

    public function verify_payment($reference)
    {

        $curl = curl_init();
        $sk = env('PAYSTACK_SECRET_KEY');

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER =>0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $sk",
                "Cache-Control: no-cache",
            ),
        ));

        $response = json_decode(curl_exec($curl));
        $err = curl_error($curl);
        // dd($response);

        curl_close($curl);


        // return $response;
        return view('user.payment-details', compact(['response']));
    }

    public function get_payment_details(Request $response){

        $server_data = $response->input('data');
        // dd($server_data);

        return view('user.payment-details', compact(['server_data']));
    }

    public function dues_receipt_view()
    {
        return view('user.dues-receipt');
    }
}
