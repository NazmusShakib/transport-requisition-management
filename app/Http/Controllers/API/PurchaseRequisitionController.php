<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequisitionRequest;
use App\Models\PurchaseRequisition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PurchaseRequisitionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $builder = PurchaseRequisition::with(['company', 'store', 'location'])
            ->orderBy('created_at', 'DESC');

        ($request->has('search')) ? $builder->search($request->search) : null;

        ($request->has('pagination') && !filter_var($request->pagination, FILTER_VALIDATE_BOOLEAN)) ?
            $purchaseRequisitions = $builder->get() :
            $purchaseRequisitions = $builder->paginate(15);

        return response()->json($purchaseRequisitions, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(PurchaseRequisitionRequest $request)
    {
        $validated = $request->validated();
        $purchaseRequisition = PurchaseRequisition::create($validated);
        return $this->sendResponse($purchaseRequisition, 'Purchase requisition has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $purchaseRequisition = PurchaseRequisition::with(['createdBy', 'company', 'section', 'division', 'source', 'store', 'location'])->findOrFail($id);
        return $this->sendResponse($purchaseRequisition, 'Purchase requisition retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(PurchaseRequisitionRequest $request, $id)
    {
        $validated = $request->validated();
        $purchaseRequisition = PurchaseRequisition::findOrFail($id);
        $purchaseRequisition->fill($validated)->save();

        return $this->sendResponse($purchaseRequisition, 'Purchase requisition has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        try {
            PurchaseRequisition::where('created_by', Auth::id())->findOrFail($id)->delete();
            return $this->sendResponse([], 'Purchase requisition has been deleted successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
