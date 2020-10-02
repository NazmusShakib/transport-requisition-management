<?php

namespace App\Http\Controllers\API;

use App\Models\Source;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SourceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $builder = Source::with('createdBy')
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
            'name' => 'required|unique:sources,name,NULL,id,deleted_at,NULL',
            'short_name' => 'nullable',
            'description' => 'nullable',
        ]);

        $input = $request->only(['name', 'short_name', 'description']);
        $create = Source::create($input);
        return $this->sendResponse($create, 'Source has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Source $source)
    {
        return $this->sendResponse($source, 'Source retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Source $source)
    {
        $this->validate($request, [
            'name' => 'required|unique:sources,name,{$source->id},id,deleted_at,NULL',
            'short_name' => 'nullable',
            'description' => 'nullable',
        ]);

        $source = $source->update([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'description' => $request->description,
        ]);

        return $this->sendResponse($source, 'Source has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Source $source)
    {
        try {
            $source->delete();
            return $this->sendResponse([], 'Source has been deleted successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
