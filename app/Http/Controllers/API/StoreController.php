<?php

namespace App\Http\Controllers\API;

use App\Models\Store;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $builder = Store::with('createdBy')
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
            'name' => 'required|unique:stores,name,NULL,id,deleted_at,NULL',
            'short_name' => 'nullable',
            'description' => 'nullable',
        ]);

        $input = $request->only(['name', 'short_name', 'description']);
        $create = Store::create($input);
        return $this->sendResponse($create, 'Store has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Store $store)
    {
        return $this->sendResponse($store, 'Store retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Store $store)
    {
        $this->validate($request, [
            'name' => 'required|unique:sources,name,{$store->id},id,deleted_at,NULL',
            'short_name' => 'nullable',
            'description' => 'nullable',
        ]);

        $store = $store->update([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'description' => $request->description,
        ]);

        return $this->sendResponse($store, 'Store has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Store $store)
    {
        try {
            $store->delete();
            return $this->sendResponse([], 'Store has been deleted successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), null, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
