<?php

namespace App\Http\Controllers;

use App\Models\ElectionCandidate;
use App\Http\Requests\StoreElectionCandidateRequest;
use App\Http\Requests\UpdateElectionCandidateRequest;

class ElectionCandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreElectionCandidateRequest $request)
    {
        //
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
    public function edit(ElectionCandidate $electionCandidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateElectionCandidateRequest $request, ElectionCandidate $electionCandidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ElectionCandidate $electionCandidate)
    {
        //
    }
}
