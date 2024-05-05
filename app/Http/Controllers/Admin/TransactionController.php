<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContestantCandidate;
use App\Models\ContestVote;
use App\Models\ResourcesPaid;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function List()
    {
        $transactions = Transactions::paginate(100);
        $total_success = Transactions::where('status', "Success")->sum('amount');
        $total_pending = Transactions::where('status', "Pending")->sum('amount');
        return view("admin.transactions.list", [
            'transactions' => $transactions,
            'total_success' => $total_success,
            'total_pending' => $total_pending
        ]);
    }


    public function Blank()
    {
        return view("admin.transactions.blank");
    }



    public function PaymentCallback(Request $request)
    {

       // dd($_GET['trxref']);

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
               
                if($updatedRecord){
                    $contest =  Transactions::where('reference', $reference)->where('purpose', 'contest fee')->first();
                    $resource =  Transactions::where('reference', $reference)->where('purpose', 'resource fee')->first();
                  if($contest){
                    $vote_paid=  ContestVote::where('id', $contest->purpose_id)->update([

                        'payment_status' => 'approved',

                    ]);
                    if($vote_paid){
                        $candidate =ContestVote::where('id', $contest->purpose_id)->first();
                        $votePaid = ContestantCandidate::find( $candidate->candidate_id);
                            $newVotes = $votePaid->votes + $candidate->vote_number;

                        $votePaid->update(['votes' => $newVotes]);
                        
                    }
                  }
                   
                    

                    if($resource){
                        $resource_paid=  ResourcesPaid::where('id', $resource->purpose_id)->update([

                            'payment_status' => 'approved',
    
                        ]);
                    }
                }
            }
        }
        $user_id = Transactions::where('reference', $reference)->value('user_id');
        // Validation
        $user_record = User::where('id', $user_id)->first(['email', 'password']);

        if ($user_record) {
            // Authenticate the user
            Auth::login($user_record);

            // Redirect the user after successful login
            return redirect('/home');
        } else {
            return redirect('/home');
        }

        //return redirect()->away(url('/user/order/page#no'));
    }





    public function Reconfirm(Request $request)
    {

        $reference = $request->orderReference;
        $orderId = $request->orderId;
        //dd($reference);
        $reference = $request->input('reference');
        $NOMBA_CLIENT_ID = env('NOMBA_CLIENT_ID');
        $NOMBA_CLIENT_SECRET = env('NOMBA_CLIENT_SECRET');
        $NOMBA_ACCOUNT_ID = env('NOMBA_ACCOUNT_ID');


        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.nomba.com/v1/auth/token/issue",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"grant_type\": \"client_credentials\",\n  \"client_id\": \"$NOMBA_CLIENT_ID\",\n  \"client_secret\": \"$NOMBA_CLIENT_SECRET\"\n}",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "accountId: $NOMBA_ACCOUNT_ID"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

       
        $auth_data = json_decode($response, true);
        $access_token = $auth_data['data']['access_token'];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.nomba.com/v1/checkout/transaction?idType=ORDER_ID&id=$orderId",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $access_token",
                "accountId: $NOMBA_ACCOUNT_ID"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response;
          // dd($response);
            $data = json_decode($response, true);
            if ($data) {
               
                if($data['data']['message'] == 'PAYMENT SUCCESSFUL'){
                    $status  = 'Success';
                }else{
                    $status  = 'Pending';
                }
               // dd($status);
                $updatedRecord =  Transactions::where('reference', $orderId)->update([

                    'gateway_response' => '',
                    'channel' => '',
                    'paid_at' => now(),
                    'other_info' => $response,
                    'status' =>  $status,
                    'message' => $data['data']['message'],


                ]);
            }
        }
        $user_id = Transactions::where('reference', $orderId)->value('user_id');
        // Validation
        $user_record = User::where('id', $user_id)->first(['email', 'password']);

        
        return redirect()->route('admin.transactions');
    }
}
