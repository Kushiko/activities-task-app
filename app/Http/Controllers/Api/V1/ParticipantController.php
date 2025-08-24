<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ParticipantResource;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ParticipantResource::collection(Participant::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // For this task, the API is read-only
    }

    /**
     * Display the specified resource.
     */
    public function show(Participant $participant)
    {
        return new ParticipantResource($participant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // For this task, the API is read-only
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // For this task, the API is read-only
    }
}