<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SupplierController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $suppliersBuilder = Supplier::with(['companies', 'buyers'])
            ->orderBy('created_at', 'DESC');

        ($request->has('search')) ? $suppliersBuilder->search($request->search) : null;

        ($request->has('pagination') && !filter_var($request->pagination, FILTER_VALIDATE_BOOLEAN)) ?
            $suppliers = $suppliersBuilder->get() :
            $suppliers = $suppliersBuilder->paginate(15);

        return response()->json($suppliers, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(SupplierRequest $request)
    {
        $validated = $request->validated();
        $supplier = Supplier::create($validated);
        return $this->sendResponse($supplier, 'Supplier has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $supplier = Supplier::with(['companies', 'buyers', 'party_type', 'nature'])->findOrFail($id);
        return $this->sendResponse($supplier, 'Supplier retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SupplierRequest $request, $id)
    {
        $validated = $request->validated();
        $supplier = Supplier::findOrFail($id);
        $supplier->fill($validated)->save();

        if ($request->hasFile('image')) {
            // $event->updateMedia($request->head_shot, 'head_shot');
        }

        return $this->sendResponse($supplier, 'Supplier has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        try {
            Supplier::where('created_by', Auth::id())->findOrFail($id)->delete();
            return $this->sendResponse([], 'Supplier has been deleted successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
