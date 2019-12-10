<?php

namespace App\Http\Controllers\API;

use App\Export;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExportController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exports = Export::with('createdBy')->select(
            'id', 'requisition_no', 'requisition_date', 'requisition_location', 'buyer_name')->paginate(10);

        return response()->json($exports, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'requisition_no' => 'required|unique:exports,requisition_no',
            'requisition_location' => 'required',
            'requisition_date' => 'required|date',
            'buyer_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'load_point' => 'required',
            'unload_point' => 'required',
            'items' => 'required',
            'qty' => 'required',
            'cbm' => 'required',
            'no_of_van' => 'required',
            'load_time' => 'required',
            'unload_time' => 'required',
            'cut_off_time' => 'required',
            'cut_off_date' => 'required',
            'fare' => 'required',
            'transport_name' => 'required',
            'cover_van_capacity' => 'required',
            'cover_van_no' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }

        // $input = $request->all();
        //$input['created_by'] = Auth::id();
        $export = Export::create([
            'requisition_no' => $request->requisition_no,
            'requisition_location' => $request->requisition_location,
            'requisition_date' => $request->requisition_date,
            'buyer_name' => $request->buyer_name,
            'load_point' => $request->load_point,
            'unload_point' => $request->unload_point,
            'items' => $request->items,
            'qty' => $request->qty,
            'cbm' => $request->cbm,
            'no_of_van' => $request->no_of_van,
            'load_time' => $request->load_time,
            'fare' => $request->fare,
            'transport_name' => $request->transport_name,
            'cover_van_capacity' => $request->cover_van_capacity,
            'cover_van_no' => $request->cover_van_no,
            'created_by' => Auth::id(),
        ]);

        return $this->sendResponse($export, 'Export requisition has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $export = Export::with('createdBy')->find($id);

        if (is_null($export)) {
            return $this->sendError('Export not found.');
        }

        return $this->sendResponse($export, 'Export retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Export::find($id)->delete();
            return $this->sendResponse([], 'Export has been deleted successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), '', 422);
        }
    }
}
