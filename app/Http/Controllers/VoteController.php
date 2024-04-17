<?php

namespace App\Http\Controllers;

use App\Models\ElectionCandidate;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote(Request $request)
    {
        $request->validate([
            'position_id' => 'required|exists:positions,id',
            'candidate_id' => 'required|exists:candidates,id',
        ]);

        $candidate = ElectionCandidate::findOrFail($request->candidate_id);
        $candidate->increment('votes');

        return redirect()->back()->with('success', 'Your vote has been cast successfully.');
    }
}
