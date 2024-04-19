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
   
   $client = new Client();
   $response = $client->post('https://api.paystack.co/transaction/initialize', [
       'headers' => [
           'Authorization' => 'Bearer ' .  env('PAYSTACK_SECRET_KEY'),
           'Content-Type' => 'application/json',
       ],
       'json' => [
           'amount' => $request->amount * 100,
           'email' => $request->email,
           'callback_url' => $callback_url,
       ],
   ]);
   if (auth()->check()) {
    $user_id = Auth()->user()->id;
} else {
   $user_id = 1;
}
   
   $data = json_decode($response->getBody(), true);
   Transactions::create([
       'user_id' => $user_id,
       'purpose' => 'contest fee',
       'purpose_id' => $lastInsertedId,
       'email' =>  $request->email,
       'amount' => $request->amount,
       'fullname' =>  'Anonymous',
       'phone_number' =>  '08132712715',
       'callback_url' => $callback_url,
       'reference' => $data['data']['reference'],
       'authorization_url' => $data['data']['authorization_url'],
   ]);
   $payment_link = $data['data']['authorization_url'];




   return redirect($data['data']['authorization_url']);

    
}


}
