<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Models\AcademicSession;
use App\Models\ContestantCandidate;
use App\Models\ContestantPosition;
use App\Models\ContestVote;
use App\Models\ElectionCandidate;
use App\Models\ElectionPosition;
use App\Models\ElectionVotes;
use App\Models\Transactions;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote(Request $request)
    {
        $ElectionVotes = new ElectionVotes();
        $ElectionVotes->user_id = Auth()->user()->id;
        $ElectionVotes->position_id = $request->position_id;
        $ElectionVotes->candidate_id = $request->candidate_id;
        $ElectionVotes->ip_address =$request->ip();
        $ElectionVotes->save();
    
     
$candidate_id = $request->candidate_id;
        $candidate = ElectionCandidate::findOrFail($candidate_id);
        $candidate->increment('votes');

        return response()->json($candidate);
        
    }

    public function index(Request $request)
    {
        $session_id = AcademicSession::latest()->first();
        $current_academic_session_id = $session_id->id;
        $positions = ElectionPosition::has('candidates')->where('academic_session',  $current_academic_session_id)->with('candidates')->get();
        //dd($positions);
        return view('member.election.votes.index', compact('positions'));
    }

    public function ContestVote($slug)
    {
    $contestant = ContestantCandidate::where('slug', $slug)->firstOrFail();
    
    $position= ContestantPosition::where('id', $contestant->position_id)->first();
    $user= User::where('id', $contestant->user_id)->first();
    return view('landingpage.payment', ['contestant' => $contestant, 'position' => $position,'user'=> $user]);
}

public function ContestVotePayment($slug)
{
$contestant = ContestantCandidate::where('slug', $slug)->firstOrFail();
// Redirect user to the payment page
return view('payment', ['contestant' => $contestant->id]);
}


// ContestantController.php

public function processPayment(Request $request)
{

    //dd($request);
    $request->validate([
        'contestant_id' => 'required',
        'num_votes' => 'required|integer|min:1',
        'amount' => 'required',
        'email' => 'required',
    ]);

    $contestant = ContestantCandidate::findOrFail($request->contestant_id);
    $numVotes = $request->num_votes;
    $id = $request->id;
  
//dd($ElectionPosition);

    $ContestVote = new ContestVote();
    $ContestVote->email = $request->email;
    $ContestVote->position_id = $contestant->position_id;
    $ContestVote->candidate_id  = $request->contestant_id;
    $ContestVote->vote_number = $request->num_votes;
    $ContestVote->amount = $request->amount;
    $ContestVote->payment_status ="pending";
    $ContestVote->save();
    $lastInsertedId = $ContestVote->id;
   $callback_url = route('payment_callback');
   $data = $this->nomba_checkout(1, $request->email, $request->amount,  $callback_url );



   
   if (auth()->check()) {
    $user_id = Auth()->user()->id;
} else {
   $user_id = 1;
}
   
  
   Transactions::create([
       'user_id' => $user_id,
       'purpose' => 'contest fee',
       'purpose_id' => $lastInsertedId,
       'email' =>  $request->email,
       'amount' => $request->amount,
       'fullname' =>  'Anonymous',
       'phone_number' =>  '08132712715',
       'callback_url' => $callback_url,
       'reference' => $data['data']['orderReference'],
       'authorization_url' => $data['data']['checkoutLink'],
   ]);
   $payment_link = $data['data']['checkoutLink'];




   return redirect($data['data']['checkoutLink']);

    
}




//nomba payment function
public function nomba_checkout($customerId, $email, $amount,  $callback_url){
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
         "cURL Error #:" . $err;
    } else {
         $response;
    }

    // dd($response);
    $auth_data = json_decode($response, true);
     $access_token = $auth_data['data']['access_token'];
   
     $reference = 'REF' . uniqid();
    

      
        //dd($access_token);
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.nomba.com/v1/checkout/order",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"order\": {\n    \"orderReference\": \"$reference\",\n    \"customerId\": \"$customerId\",\n    \"callbackUrl\": \"$callback_url\",\n    \"customerEmail\": \"$email\",\n    \"amount\": \"$amount\",\n    \"currency\": \"NGN\"\n  },\n  \"tokenizeCard\": \"false\"\n}",
            
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $access_token",
                "Content-Type: application/json",
                "Cache-Control: no-cache",
                "accountId: $NOMBA_ACCOUNT_ID",
            ],
        ]);

        $result  = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
             "cURL Error #:" . $err;
        } else {
           
            $result;
        }
        
      return  $data = json_decode($result, true);
}


}
