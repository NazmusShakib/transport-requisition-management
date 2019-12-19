<?php

namespace App\Http\Controllers\API;

use App\Helpers\Helper;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Import;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ImportController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imports = Import::with('createdBy')->select(
            'id', 'requisition_no', 'requisition_date', 'requisition_location', 'consignee_name')->paginate(10);

        return response()->json($imports, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'requisition_no' => 'required|unique:imports,requisition_no',
            'requisition_date' => 'required|date',
            'requisition_location' => 'required',
            'consignee_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'lc_no' => 'required',
            'lc_date' => 'required|date',
            'items' => 'required',
            'qty' => 'required|numeric|digits_between:1,10',
            'no_of_box' => 'required',
            'no_of_drum' => 'required',
            'no_of_jar' => 'required',
            'no_of_bag' => 'required',
            'no_of_roll' => 'required',
            'no_of_bell' => 'required',
            'no_of_cbm' => 'required',
            'cnf_name' => 'required|regex:/^[\pL\s\-]+$/u',
            // 'jetty_sorkar_cell_no' => 'required|size:11|regex:/(01)[0-9]{9}/',
            'load_time' => 'required',
            'get_out_time' => 'required',
            'storage_location' => 'required',
            'store_concern_name' => 'required|regex:/^[\pL\s\-]+$/u',
            // 'store_concern_cell_no' => 'required|size:11|regex:/(01)[0-9]{9}/',
            'no_of_van' => 'required',
            'fare' => 'required|numeric',
            'transport_name' => 'required',
            'cover_van_capacity' => 'required',
            'cover_van_no' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }

//        $input = $request->all();
//        return $input;

        $import = Import::create([
            'requisition_no' => $request->requisition_no,
            'requisition_date' => $request->requisition_date,
            'created_by' => Auth::id(),
            'requisition_location' => $request->requisition_location,
            'consignee_name' => $request->consignee_name,
            'lc_no' => $request->lc_no,
            'lc_date' => $request->lc_date,
            'items' => $request->items,
            'qty' => $request->qty,
            'no_of_box' => $request->no_of_box,
            'no_of_drum' => $request->no_of_drum,
            'no_of_jar' => $request->no_of_jar,
            'no_of_bag' => $request->no_of_bag,
            'no_of_roll' => $request->no_of_roll,
            'no_of_bell' => $request->no_of_bell,
            'no_of_cbm' => $request->no_of_cbm,
            'cnf_name' => $request->cnf_name,
            'jetty_sorkar_cell_no' => $request->jetty_sorkar_cell_no,
            'load_time' => $request->load_time,
            'get_out_time' => $request->get_out_time,
            'storage_location' => $request->storage_location,
            'store_concern_name' => $request->store_concern_name,
            'store_concern_cell_no' => $request->store_concern_cell_no,
            'no_of_van' => $request->no_of_van,
            'fare' => $request->fare,
            'transport_name' => $request->transport_name,
            'cover_van_capacity' => $request->cover_van_capacity,
            'cover_van_no' => $request->cover_van_no,
        ]);

        return $this->sendResponse($import, 'Import requisition has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Import::find($id)->delete();
            return $this->sendResponse([], 'Import has been deleted successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), '', 422);
        }
    }


    public function generateRequisitionNo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'requisition_location' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        } else {
            $generateRequisitionNo = Helper::generateRequisitionNo($request->requisition_location, 'imports');
            return $this->sendResponse($generateRequisitionNo, 'Imports requisition no generated successfully.');
        }
    }
}
