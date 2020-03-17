<?php

namespace App\Http\Controllers\API;

use App\Models\PartyType;
use Illuminate\Http\Request;

class PartyTypeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $partyTypes = PartyType::with('createdBy')
            ->orderBy('created_at', 'DESC')->paginate(15);

        return response()->json($partyTypes, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PartyType  $partyType
     * @return \Illuminate\Http\Response
     */
    public function show(PartyType $partyType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PartyType  $partyType
     * @return \Illuminate\Http\Response
     */
    public function edit(PartyType $partyType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PartyType  $partyType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PartyType $partyType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PartyType  $partyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PartyType $partyType)
    {
        //
    }
}
