<?php

namespace App\Http\Controllers;

use App\Models\ElectionPosition;
use App\Http\Requests\StoreElectionPositionRequest;
use App\Http\Requests\UpdateElectionPositionRequest;
use App\Models\AcademicSession;
use App\Models\ElectionCandidate;
use Illuminate\Http\Request;


class ElectionPositionController extends Controller
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
        $electionPositions = ElectionPosition::with('academicSession')->where('academic_session', $current_academic_session_id )->latest()->get();
      return view('admin.election.positions.index', compact('electionPositions', 'academic_sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academic_sessions = AcademicSession::latest()->get();
      return view('admin.election.positions.create', compact('academic_sessions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreElectionPositionRequest $request)
    {
        $validatedData = $request->validated();
          
    $election_position = new ElectionPosition();
    $election_position->name = $validatedData['name'];
    $election_position->order_no = $validatedData['order_no'];
    $election_position->academic_session = $request->academic_session;
    $election_position->form_amt = $request->form_amt;
    
    $election_position->admin_id = auth()->user()->id;
       $election_position->save();

  
    return redirect()->route('admin.positions.create')->with('success', 'Position created successfully!');


       
    }

    /**
     * Display the specified resource.
     */
    public function show(ElectionPosition $electionPosition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ElectionPosition $electionPosition, $id)
    {
        $electionPosition = ElectionPosition::findOrFail($id);
        $academic_sessions = AcademicSession::latest()->get();
        return view('admin.election.positions.edit', compact('academic_sessions','electionPosition' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateElectionPositionRequest $request, ElectionPosition $electionPosition, $id)
    {
        $validatedData = $request->validated();
          
       ElectionPosition::findOrFail($id)->update([
           
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
    public function destroy(ElectionPosition $electionPosition, $id)
    {
       //dd($id);
       $electionCandidate = ElectionCandidate::where('position_id', $id)->count();
       //dd($brand_have_product);
       if ($electionCandidate < 1) {
       ElectionPosition::findOrFail($id)->delete();

        $notification = array(
           'success' => 'Election Deleted Successfully',
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
}
