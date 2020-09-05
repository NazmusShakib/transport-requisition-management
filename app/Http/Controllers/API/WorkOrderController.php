<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\WorkOrderRequest;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class WorkOrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $builder = WorkOrder::with(['company', 'supplier', 'source', 'location'])
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
    public function store(WorkOrderRequest $request)
    {
        $validated = $request->validated();
        $workOrder = WorkOrder::create($validated);
        return $this->sendResponse($workOrder, 'Work order has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $workOrder = WorkOrder::with(['createdBy', 'company', 'supplier', 'source', 'location'])->findOrFail($id);
        return $this->sendResponse($workOrder, 'Work order retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(WorkOrderRequest $request, $id)
    {
        $validated = $request->validated();
        $workOrder = WorkOrder::findOrFail($id);
        $workOrder->fill($validated)->save();

        return $this->sendResponse($workOrder, 'Work order has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        try {
            WorkOrder::where('created_by', Auth::id())->findOrFail($id)->delete();
            return $this->sendResponse([], 'Work order has been deleted successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
