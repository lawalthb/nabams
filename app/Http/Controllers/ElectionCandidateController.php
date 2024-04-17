<?php

namespace App\Http\Controllers;

use App\Models\ElectionCandidate;
use App\Http\Requests\StoreElectionCandidateRequest;
use App\Http\Requests\UpdateElectionCandidateRequest;
use App\Models\AcademicSession;
use App\Models\ElectionPosition;
use App\Models\User;
use Illuminate\Http\Request;

class ElectionCandidateController extends Controller
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
        $electionCandidates = ElectionCandidate::with('academicSession')->where('academic_session', $current_academic_session_id )->orderBy('position_id')->latest()->get();
      return view('admin.election.candidates.index', compact('electionCandidates', 'academic_sessions'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academic_sessions = AcademicSession::latest()->get();
        $users = User::orderBy('lastname')->get();

        return view('admin.election.candidates.create', compact('academic_sessions', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreElectionCandidateRequest $request)
    {
        $validatedData = $request->validated();
        $election_candidate = new ElectionCandidate();
        $election_candidate->academic_session = $request->academic_session;
        $election_candidate->position_id = $request->position_id;
        $election_candidate->user_id = $request->user_id;
        $election_candidate->name = $validatedData['name'];
        $election_candidate->payment_status ="approved";
        $election_candidate->save();
    
      
        return redirect()->route('admin.candidates.create')->with('success', 'Candidate created successfully!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(ElectionCandidate $electionCandidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ElectionCandidate $electionCandidate, Request $request)
    {
       $id = $request->id;
       $users = User::orderBy('lastname')->get();
        $electionCandidate = ElectionCandidate::findOrFail($id);
        $academic_sessions = AcademicSession::latest()->get();
        return view('admin.election.candidates.edit', compact('academic_sessions','electionCandidate', 'users' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request2)
    {
        ElectionCandidate::findOrFail($request2->id)->update([
           
            'payment_status' => $request2->payment_status,
            'name' => $request2->name,
           
        ]);
 
        return redirect()->route('admin.candidates.index')->with('success', 'Candidate updated successfully!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ElectionCandidate $electionCandidate)
    {
        //
    }


    public function getPositionBySession(Request $request)
    {
        
        $id = $request->input('id');

       
        $positions = ElectionPosition::where('academic_session', $id)->get();

        
        return response()->json($positions);
    }
    

    //list for member
    public function list(Request $request)
    {
        if(isset($request->id) and $request->id !=""){
            $current_academic_session_id = $request->id;
        }else{
            $session_id = AcademicSession::latest()->first();
            $current_academic_session_id = $session_id->id;
        }
        $academic_sessions = AcademicSession::latest()->get();
        $electionCandidates = ElectionCandidate::with('academicSession')->where('academic_session', $current_academic_session_id )->orderBy('position_id')->latest()->get();
      return view('member.election.candidates.list', compact('electionCandidates', 'academic_sessions'));
    }
}
