<?php

namespace App\Http\Controllers\API;

use App\Models\Location;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocationController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $builder = Location::with('createdBy')
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
            'name' => 'required|unique:locations,name,NULL,id,deleted_at,NULL',
            'short_name' => 'nullable',
            'description' => 'nullable',
        ]);

        $input = $request->only(['name', 'short_name', 'description']);
        $create = Location::create($input);
        return $this->sendResponse($create, 'Location has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Location $location)
    {
        return $this->sendResponse($location, 'Location retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Location $location)
    {
        $this->validate($request, [
            'name' => 'required|unique:locations,name,{$location->id},id,deleted_at,NULL',
            'short_name' => 'nullable',
            'description' => 'nullable',
        ]);

        $location = $location->update([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'description' => $request->description,
        ]);

        return $this->sendResponse($location, 'Location has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Location $location)
    {
        try {
            $location->delete();
            return $this->sendResponse([], 'Location has been deleted successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
