<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Models\ContestantPosition;
use App\Models\AcademicSession;
use App\Models\ContestantCandidate;
use App\Models\Transactions;
use GuzzleHttp\Client;
use Illuminate\Http\Request;


class ContestantPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(isset($request->id) and $request->id !=""){
            $current_academic_session_id = $request->id;
        }else{
            $session_id = AcademicSession::latest()->first();
            $current_academic_session_id = $session_id->id;
        }
        $academic_sessions = AcademicSession::latest()->get();
        $ContestantPositions = ContestantPosition::with('academicSession')->where('academic_session', $current_academic_session_id )->latest()->get();
      return view('admin.Contestant.positions.index', compact('ContestantPositions', 'academic_sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academic_sessions = AcademicSession::latest()->get();
      return view('admin.Contestant.positions.create', compact('academic_sessions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
          
    $Contestant_position = new ContestantPosition();
    $Contestant_position->name = $request->name;
    $Contestant_position->order_no = $request->order_no;
    $Contestant_position->academic_session = $request->academic_session;
    $Contestant_position->price = $request->price;
    
    $Contestant_position->admin_id = auth()->user()->id;
       $Contestant_position->save();

  
    return redirect()->route('admin.contest.positions.create')->with('success', 'Constest Position created successfully!');


       
    }

    /**
     * Display the specified resource.
     */
    public function show(ContestantPosition $ContestantPosition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContestantPosition $ContestantPosition, $id)
    {
        $ContestantPosition = ContestantPosition::findOrFail($id);
        $academic_sessions = AcademicSession::latest()->get();
        return view('admin.Contestant.positions.edit', compact('academic_sessions','ContestantPosition' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContestantPosition $ContestantPosition, $id)
    {
        $validatedData = $request->validated();
          
       ContestantPosition::findOrFail($id)->update([
           
           'name' => $validatedData['name'],
           'order_no' => $validatedData['order_no'],
           'academic_session' => $request->academic_session,
           'form_amt' => $request->form_amt,
           'admin_id' => auth()->user()->id,
           
       ]);

       return redirect()->route('admin.positions.index')->with('success', 'Position updated successfully!');
   

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContestantPosition $ContestantPosition, $id)
    {
       //dd($id);
       $ContestantCandidate = ContestantCandidate::where('position_id', $id)->count();
       //dd($brand_have_product);
       if ($ContestantCandidate < 1) {
       ContestantPosition::findOrFail($id)->delete();

        $notification = array(
           'success' => 'Contestant Deleted Successfully',
           'alert-type' => 'success'
       );
       } else {

           $notification = array(
               'message' => 'You can not delete Position, it has Candidate',
               'alert-type' => 'info'
           );
       }
       return redirect()->back()->with($notification);
        

    }

//list for member
    public function list(Request $request)
    {
        dd(1);
        if(isset($request->id) and $request->id !=""){
            $current_academic_session_id = $request->id;
        }else{
            $session_id = AcademicSession::latest()->first();
            $current_academic_session_id = $session_id->id;
        }
        $session_id2 = AcademicSession::latest()->first();

        $positions =ContestantPosition::where('academic_session',$session_id2->id)->get();
       //dd($positions);
       $academic_sessions = AcademicSession::latest()->get();
       if(isset($request->contestant_id) and $request->contestant_id !=""){
           $ContestantPosition = ContestantPosition::with('academicSession')->where('academic_session', $current_academic_session_id )->where('contestant_id', $request->contestant_id )->orderBy('position_id')->latest()->get();
       }else{
           $ContestantPosition = ContestantPosition::with('academicSession')->where('academic_session', $current_academic_session_id )->orderBy('contestant_id')->latest()->get();
       }

        $academic_sessions = AcademicSession::latest()->get();
        $ContestantPositions = ContestantPosition::with('academicSession')->where('academic_session', $current_academic_session_id )->latest()->get();
      return view('member.Contestant.positions.list', compact('ContestantPositions', 'academic_sessions'));
    }

//member to buy form
    public function buyform(Request $request)
    {

        $id = $request->id;
        $ContestantPosition = ContestantPosition::findOrFail($id)->first();
//dd($ContestantPosition);

        $Contestant_candidate = new ContestantCandidate();
        $Contestant_candidate->academic_session = $ContestantPosition->academic_session;
        $Contestant_candidate->position_id = $id;
        $Contestant_candidate->user_id = Auth()->user()->id;
        $Contestant_candidate->name = Auth()->user()->lastname . " " . Auth()->user()->firstname;
        $Contestant_candidate->payment_status ="pending";
        $Contestant_candidate->save();


         // dd($ContestantPosition);
       $callback_url = route('member.payment_callback');
       // send a welcome email to new member

       // store transaction



       //   dd('goto payment gateway');
       $client = new Client();
       $response = $client->post('https://api.paystack.co/transaction/initialize', [
           'headers' => [
               'Authorization' => 'Bearer ' .  env('PAYSTACK_SECRET_KEY'),
               'Content-Type' => 'application/json',
           ],
           'json' => [
               'amount' => $ContestantPosition->form_amt * 100,
               'email' => Auth()->user()->email,
               'callback_url' => $callback_url,
               'firstname' => 'ade',
               'lastname' => 'oriyomi',
               'phone_no' => '08132712715',

           ],
       ]);
       $data = json_decode($response->getBody(), true);
       Transactions::create([
           'user_id' => Auth()->user()->id,
           'purpose' => 'Contestant fee',
           'email' =>  Auth()->user()->email,
           'amount' => $ContestantPosition->form_amt,
           'fullname' =>  Auth()->user()->lastname . " " . Auth()->user()->firstname,
           'phone_number' =>  Auth()->user()->phone,
           'callback_url' => $callback_url,
           'reference' => $data['data']['reference'],
           'authorization_url' => $data['data']['authorization_url'],
       ]);
       $payment_link = $data['data']['authorization_url'];

       event(new UserRegistered(Auth()->user(), $payment_link));



       return redirect($data['data']['authorization_url']);
    


       
    }


   

}
