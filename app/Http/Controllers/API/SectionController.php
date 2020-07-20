<?php

namespace App\Http\Controllers\API;

use App\Models\Section;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SectionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $builder = Section::with('createdBy')
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
            'name' => 'required|unique:sections,name,NULL,id,deleted_at,NULL',
            'short_name' => 'nullable',
            'description' => 'nullable',
        ]);

        $input = $request->only(['name', 'short_name', 'description']);
        $create = Section::create($input);
        return $this->sendResponse($create, 'Location has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Section $section)
    {
        return $this->sendResponse($section, 'Section retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Section $section)
    {
        $this->validate($request, [
            'name' => 'required|unique:sections,name,{$section->id},id,deleted_at,NULL',
            'short_name' => 'nullable',
            'description' => 'nullable',
        ]);

        $section = $section->update([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'description' => $request->description,
        ]);

        return $this->sendResponse($section, 'Section has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Section $section)
    {
        try {
            $section->delete();
            return $this->sendResponse([], 'Section has been deleted successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
