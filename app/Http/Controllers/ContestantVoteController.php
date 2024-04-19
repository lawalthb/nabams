<?php

namespace App\Http\Controllers;

use App\Models\AcademicSession;
use App\Models\ContestantCandidate;
use App\Models\ContestantPosition;
use App\Models\ContestantVotes;
use Illuminate\Http\Request;

class ContestantVoteController extends Controller
{
    public function vote(Request $request)
    {
        $ContestantVotes = new ContestantVotes();
        $ContestantVotes->user_id = Auth()->user()->id;
        $ContestantVotes->position_id = $request->position_id;
        $ContestantVotes->candidate_id = $request->candidate_id;
        $ContestantVotes->ip_address =$request->ip();
        $ContestantVotes->save();
    
     
$candidate_id = $request->candidate_id;
        $candidate = ContestantCandidate::findOrFail($candidate_id);
        $candidate->increment('votes');

        return response()->json($candidate);
        
    }

    public function index(Request $request)
    {
        $session_id = AcademicSession::latest()->first();
        $current_academic_session_id = $session_id->id;
        $positions = ContestantPosition::has('candidates')->where('academic_session',  $current_academic_session_id)->with('candidates')->get();
        //dd($positions);
        return view('member.Contestant.votes.index', compact('positions'));
    }
}
