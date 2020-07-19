<?php

namespace App\Http\Controllers\API;

use App\Models\PartyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PartyTypeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $partyTypesBuilder = PartyType::with('createdBy')
            ->orderBy('created_at', 'DESC');

        ($request->has('search')) ? $partyTypesBuilder->search($request->search) : null;

        ($request->has('pagination') && !filter_var($request->pagination, FILTER_VALIDATE_BOOLEAN)) ?
            $partyTypes = $partyTypesBuilder->get() :
            $partyTypes = $partyTypesBuilder->paginate(15);

        return response()->json($partyTypes, Response::HTTP_OK);
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
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:party_types,name,NULL,id,deleted_at,NULL',
            'display_name' => 'nullable',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Prerequisite failed.', $validator->errors(), 422);
        }

        $input = $request->only(['name', 'display_name', 'description']);
        $partyType = PartyType::create($input);
        return $this->sendResponse($partyType, 'Party type has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vehicle = PartyType::with('createdBy')->find($id);

        if (is_null($vehicle)) {
            return $this->sendError('Party type not found.');
        }

        return $this->sendResponse($vehicle, 'Party type retrieved successfully.');
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
     */
    public function update(Request $request, PartyType $partyType)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required|unique:party_types,name,{$partyType->id},id,deleted_at,NULL",
            'display_name' => 'nullable',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Prerequisite failed.', $validator->errors(), 422);
        }

        $partyType->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);

        return $this->sendResponse($partyType, 'Party type has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        try {
            PartyType::findOrFail($id)->delete();
            return $this->sendResponse([], 'Party type has been deleted successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), '', 422);
        }
    }
}
