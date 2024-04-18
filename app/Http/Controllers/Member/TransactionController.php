<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use App\Models\User;
use App\Models\WebColours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function List(Request  $request)
    {
        $user_id = auth()->user()->id;
        $transactions = Transactions::select(
            'id',
            'purpose',
            'email',
            'amount',

            'reference',
            'status',
            'paid_at',

            'gateway_response',
        )->where('purpose', $request->purpose)->where('user_id', $user_id)->get();

        return view("member.transactions.list", [
            'transactions' => $transactions,
            'purpose' => $request->purpose,

        ]);
    }



    public function Receipt(Request  $request)
    {
        $ref = $request->receipt;
        $user_id = auth()->user()->id;
        $transactions = Transactions::select(
            'id',
            'purpose',
            'email',
            'amount',

            'reference',
            'status',
            'paid_at',

            'gateway_response',
        )->where('purpose', $request->purpose)->where('user_id', $user_id)->get();

        return view("member.transactions.receipt", [
            'transactions' => $transactions,

        ]);
    }

    public function Blank()
    {


        return view("member.transactions.blank");
    }


    public function PaymentCallback(Request $request)
    {

        $reference = $request->input('reference');
        $s_key = env('PAYSTACK_SECRET_KEY');
        // Verify payment
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $reference,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $s_key",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response;
            //dd($response);
            $data = json_decode($response, true);
            if ($data) {
                $updatedRecord =  Transactions::where('reference', $reference)->update([

                    'gateway_response' => $data['data']['gateway_response'],
                    'channel' => $data['data']['channel'],
                    'paid_at' => $data['data']['paid_at'],
                    'other_info' => $response,
                    'status' => 'success',


                ]);
            }
        }
        $user_id = Transactions::where('reference', $reference)->value('user_id');
        // Validation
        $user_record = User::where('id', $user_id)->first(['email', 'password']);

        if ($user_record) {
          
            // Redirect the user after successful login
            return redirect('/home');
        } else {
            // Handle the case where the user with the specified ID does not exist
        }

        //return redirect()->away(url('/user/order/page#no'));
    }
}
