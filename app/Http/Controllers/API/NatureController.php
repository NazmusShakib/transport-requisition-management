<?php

namespace App\Http\Controllers\API;

use App\Models\Nature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class NatureController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $naturesBuilder = Nature::with('createdBy')
            ->orderBy('created_at', 'DESC');

        ($request->has('search')) ? $naturesBuilder->search($request->search) : null;

        ($request->has('pagination') && !filter_var($request->pagination, FILTER_VALIDATE_BOOLEAN)) ?
            $natures = $naturesBuilder->get() :
            $natures = $naturesBuilder->paginate(15);

        return response()->json($natures, Response::HTTP_OK);
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
            'name' => 'required|unique:natures,name,NULL,id,deleted_at,NULL',
            'display_name' => 'nullable',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Prerequisite failed.', $validator->errors(), 422);
        }

        $input = $request->only(['name', 'display_name', 'description']);
        $nature = Nature::create($input);
        return $this->sendResponse($nature, 'Nature has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $nature = Nature::with('createdBy')->find($id);

        if (is_null($nature)) {
            return $this->sendError('Nature not found.');
        }

        return $this->sendResponse($nature, 'Nature retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nature  $nature
     * @return \Illuminate\Http\Response
     */
    public function edit(Nature $nature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Nature $nature)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required|unique:natures,name,{$nature->id},id,deleted_at,NULL",
            'display_name' => 'nullable',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Prerequisite failed.', $validator->errors(), 422);
        }

        $nature->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);

        return $this->sendResponse($nature, 'Nature has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        try {
            Nature::find($id)->delete();
            return $this->sendResponse([], 'Nature has been deleted successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), '', 422);
        }
    }
}
