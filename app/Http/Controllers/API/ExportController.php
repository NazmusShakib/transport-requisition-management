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
        //
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
            'requisition_no' => 'required',
            'requisition_date' => 'required|date',
            'requisition_location' => 'required',
            'buyer_name' => 'required',
            'load_point' => 'required',
            'unload_point' => 'required',
            'items' => 'required',
            'qty' => 'required',
            'cbm' => 'required',
            'no_of_van' => 'required',
            'load_time' => 'required',
            'unload_time' => 'required',
            'cut_off_moment' => 'required',
            'fare' => 'required',
            'transport_name' => 'required',
            'cover_van_capacity' => 'required',
            'cover_van_no' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 422);
        }

        $input = $request->all();
        $input['created_by'] = Auth::id();
        $export = Export::create($input);

        return $this->sendResponse($export, 'Export requisition has been created successfully.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
