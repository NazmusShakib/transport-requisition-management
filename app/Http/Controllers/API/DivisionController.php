<?php

namespace App\Http\Controllers\API;

use App\Models\Division;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DivisionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $builder = Division::with('createdBy')
            ->orderBy('created_at', 'DESC');

        ($request->has('search')) ? $builder->search($request->search) : null;

        ($request->has('pagination') && !filter_var($request->pagination, FILTER_VALIDATE_BOOLEAN)) ?
            $result = $builder->get() :
            $result = $builder->paginate(15);

        return response()->json($result, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:divisions,name,NULL,id,deleted_at,NULL',
            'short_name' => 'nullable',
            'description' => 'nullable',
        ]);

        $input = $request->only(['name', 'short_name', 'description']);
        $create = Division::create($input);
        return $this->sendResponse($create, 'Division has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Division $division)
    {
        return $this->sendResponse($division, 'Division retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Division $division)
    {
        $this->validate($request, [
            'name' => 'required|unique:divisions,name,{$division->id},id,deleted_at,NULL',
            'short_name' => 'nullable',
            'description' => 'nullable',
        ]);

        $division = $division->update([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'description' => $request->description,
        ]);

        return $this->sendResponse($division, 'Division has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        try {
            Division::findOrFail($id)->delete();
            return $this->sendResponse([], 'Division has been deleted successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}