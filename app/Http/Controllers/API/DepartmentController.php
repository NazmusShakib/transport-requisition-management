<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class DepartmentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $departmentsBuilder = Department::with('createdBy')
            ->orderBy('created_at', 'DESC');

        ($request->has('search')) ? $departmentsBuilder->search($request->search) : null;

        ($request->has('pagination') && !filter_var($request->pagination, FILTER_VALIDATE_BOOLEAN)) ?
            $departments = $departmentsBuilder->get() :
            $departments = $departmentsBuilder->paginate(15);

        return response()->json($departments, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:departments,name,NULL,id,deleted_at,NULL',
            'short_name' => 'nullable',
            'description' => 'nullable',
        ]);

        $input = $request->only(['name', 'short_name', 'description']);
        $create = Department::create($input);
        return $this->sendResponse($create, 'Department has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $find = Department::with('createdBy')->findOrFail($id);
        return $this->sendResponse($find, 'Department type retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:departments,name,{$id},id,deleted_at,NULL',
            'short_name' => 'nullable',
            'description' => 'nullable',
        ]);
        $find = Department::findOrFail($id);

        $find->update([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'description' => $request->description,
        ]);

        return $this->sendResponse($find, 'Department has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        try {
            Department::findOrFail($id)->delete();
            return $this->sendResponse([], 'Department has been deleted successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
