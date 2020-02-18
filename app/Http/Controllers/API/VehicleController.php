<?php

namespace App\Http\Controllers\API;

use App\Helpers\Helper;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VehicleController extends BaseController
{
    public function index()
    {
        $vehicles = Vehicle::with('createdBy')
            ->orderBy('created_at', 'DESC')->paginate(15);

        return response()->json($vehicles, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:vehicles,name,NULL,id,deleted_at,NULL',
            'display_name' => 'nullable',
            'registration_no' => 'nullable',
            'chassis_no' => 'nullable',
            'motor_cc' => 'nullable|regex:/^\d+(\.\d{1,3})?$/',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Prerequisite failed.', $validator->errors(), 422);
        }

        $input = $request->only(['name', 'display_name', 'registration_no', 'chassis_no', 'motor_cc', 'description']);
        $badge = Vehicle::create($input);
        return $this->sendResponse($badge, 'Vehicle has been created successfully.');
    }

    public function show($id)
    {
        $vehicle = Vehicle::with('createdBy')->find($id);

        if (is_null($vehicle)) {
            return $this->sendError('Vehicle not found.');
        }

        return $this->sendResponse($vehicle, 'Vehicle retrieved successfully.');
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required|unique:vehicles,name,{$vehicle->id},id,deleted_at,NULL",
            'display_name' => 'nullable',
            'registration_no' => 'nullable',
            'chassis_no' => 'nullable',
            'motor_cc' => 'nullable|regex:/^\d+(\.\d{1,3})?$/',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Prerequisite failed.', $validator->errors(), 422);
        }

        $vehicle->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'registration_no' => $request->registration_no,
            'chassis_no' => $request->chassis_no,
            'motor_cc' => $request->motor_cc,
            'description' => $request->description,
        ]);

        return $this->sendResponse($vehicle, 'Vehicle has been updated successfully.');
    }

    public function destroy($id)
    {
        try {
            Vehicle::find($id)->delete();
            return $this->sendResponse([], 'Vehicle has been deleted successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), '', 422);
        }
    }

}
