<?php

namespace App\Http\Controllers\API;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $companiesBuilder = Company::with('createdBy')
            ->orderBy('created_at', 'DESC');

        ($request->has('search')) ? $companiesBuilder->search($request->search) : null;

        $companies = $companiesBuilder->paginate(15);

        return response()->json($companies, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
            'name' => 'required|unique:companies,name,NULL,id,deleted_at,NULL',
            'display_name' => 'nullable',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Prerequisite failed.', $validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $input = $request->only(['name', 'display_name', 'description']);
        $company = Company::create($input);
        return $this->sendResponse($company, 'Company has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::with('createdBy')->find($id);

        if (is_null($company)) {
            return $this->sendError('Company not found.');
        }

        return $this->sendResponse($company, 'Company retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required|unique:companies,name,{$company->id},id,deleted_at,NULL",
            'display_name' => 'nullable',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Prerequisite failed.', $validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $company->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);

        return $this->sendResponse($company, 'Company has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Company::find($id)->delete();
            return $this->sendResponse([], 'Company has been deleted successfully.');
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
