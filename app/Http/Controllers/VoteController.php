<?php

namespace App\Http\Controllers;

use App\Models\AcademicSession;
use App\Models\ElectionCandidate;
use App\Models\ElectionPosition;
use App\Models\ElectionVotes;
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
}
