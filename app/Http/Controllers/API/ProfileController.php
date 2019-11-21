<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Profile as ProfileResource;

class ProfileController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();

        return $this->sendResponse(ProfileResource::collection($profiles), 'Profiles retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'notes' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $product = Profile::create($input);

        return $this->sendResponse(new ProfileResource($product), 'Profile created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::find($id);

        if (is_null($profile)) {
            return $this->sendError('Profile not found.');
        }

        return $this->sendResponse(new ProfileResource($profile), 'Profile retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'notes' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $profile->notes = $input['notes'];
        $profile->save();

        return $this->sendResponse(new ProfileResource($profile), 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param Profile $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Profile $product)
    {
        $product->delete();

        return $this->sendResponse([], 'Profile deleted successfully.');
    }
}
