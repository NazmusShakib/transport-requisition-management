<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\BuyerRequest;
use App\Models\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class BuyerController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $buyers = Buyer::with('createdBy')
            ->orderBy('created_at', 'DESC')->paginate(15);

        return response()->json($buyers, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BuyerRequest $request)
    {
        $input = $request->only(['name', 'phone', 'email', 'address', 'company_id']);
        $buyer = Buyer::create($input);
        return $this->sendResponse($buyer, 'Buyer has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $buyer = Buyer::with('createdBy')->find($id);

        if (is_null($buyer)) {
            return $this->sendError('Buyer not found.');
        }

        return $this->sendResponse($buyer, 'Buyer retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Buyer $buyer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(BuyerRequest $request, Buyer $buyer)
    {
        $buyer->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'company_id' => $request->company_id,
        ]);

        return $this->sendResponse($buyer, 'Buyer has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        try {
            Buyer::find($id)->delete();
            return $this->sendResponse([], 'Buyer has been deleted successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
