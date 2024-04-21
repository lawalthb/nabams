<?php

namespace App\Http\Controllers;

use App\Models\ContestantCandidate;
use App\Http\Requests\StoreContestantCandidateRequest;
use App\Http\Requests\UpdateContestantCandidateRequest;
use App\Models\AcademicSession;
use App\Models\ContestantPosition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContestantCandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(isset($request->id) and $request->id !="")        {
           $current_academic_session_id = $request->id;
        }else{
            $session_id = AcademicSession::latest()->first();
            $current_academic_session_id = $session_id->id;
           

        }
        $session_id2 = AcademicSession::latest()->first();

         $positions =ContestantPosition::where('academic_session',$session_id2->id)->get();
        //dd($positions);
        $academic_sessions = AcademicSession::latest()->get();
        if(isset($request->position_id) and $request->position_id !=""){
            $ContestantCandidates = ContestantCandidate::with('academicSession')->where('academic_session', $current_academic_session_id )->where('position_id', $request->position_id )->orderBy('position_id')->latest()->get();
        }else{
            $ContestantCandidates = ContestantCandidate::with('academicSession')->where('academic_session', $current_academic_session_id )->orderBy('position_id')->latest()->get();
        }
       
      return view('admin.Contestant.candidates.index', compact('ContestantCandidates', 'academic_sessions', 'positions'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academic_sessions = AcademicSession::latest()->get();
        $users = User::orderBy('lastname')->get();

        return view('admin.Contestant.candidates.create', compact('academic_sessions', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $slug = Str::slug($request->name);
       $vote_link = url("vote/$slug");
        $Contestant_candidate = new ContestantCandidate();
        $Contestant_candidate->academic_session = $request->academic_session;
        $Contestant_candidate->position_id = $request->position_id;
        $Contestant_candidate->user_id = $request->user_id;
        $Contestant_candidate->name = $request->name;
        $Contestant_candidate->slug = $slug;
        $Contestant_candidate->vote_link = $vote_link;
        $Contestant_candidate->payment_status ="approved";
        $Contestant_candidate->save();
    
      
        return redirect()->route('admin.contest.candidates.create')->with('success', 'Candidate created successfully!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(ContestantCandidate $ContestantCandidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContestantCandidate $ContestantCandidate, Request $request)
    {
       $id = $request->id;
       $users = User::orderBy('lastname')->get();
        $ContestantCandidate = ContestantCandidate::findOrFail($id);
        $academic_sessions = AcademicSession::latest()->get();
        return view('admin.Contestant.candidates.edit', compact('academic_sessions','ContestantCandidate', 'users' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request2)
    {
        ContestantCandidate::findOrFail($request2->id)->update([
           
            'payment_status' => $request2->payment_status,
            'name' => $request2->name,
           
        ]);
 
        return redirect()->route('admin.candidates.index')->with('success', 'Candidate updated successfully!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContestantCandidate $ContestantCandidate)
    {
        //
    }


    public function getPositionBySession(Request $request)
    {
        
        $id = $request->input('id');

       
        $positions = ContestantPosition::where('academic_session', $id)->get();

        
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

        $session_id2 = AcademicSession::latest()->first();
        $positions =ContestantPosition::where('academic_session',$session_id2->id)->get();

        if(isset($request->position_id) and $request->position_id !=""){
            $ContestantCandidates = ContestantCandidate::with('academicSession')->where('academic_session', $current_academic_session_id )->where('position_id', $request->position_id )->orderBy('position_id')->latest()->get();
        }else{
            $ContestantCandidates = ContestantCandidate::with('academicSession')->where('academic_session', $current_academic_session_id )->orderBy('position_id')->latest()->get();
        }
       


        $academic_sessions = AcademicSession::latest()->get();
        
      return view('member.Contestant.candidates.list', compact('ContestantCandidates', 'academic_sessions', 'positions'));
    }
}
