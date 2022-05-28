<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['companies'] = Company::query()->paginate(20);
        return view("dashboard.company.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['company'] = new Company();
        $data['action'] = route("admin.company.store");
        $data['method'] = "post";
        return view("dashboard.company.form",$data);
    }


    public function store(CompanyStoreRequest $request)
    {
        $company = Company::create($request->validated());
        return response()->redirectToRoute("admin.company.index")
            ->with("success",'Company "'.$company->name.'" created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $data['company'] = $company;
        return view("dashboard.company.show",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $data['company'] = $company;
        $data['action'] = route("admin.company.update",$company->id);
        $data['method'] = "put";
        return view("dashboard.company.form",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, Company $company)
    {
        $company->update($request->validated());
        return back()->with("success",'Company "'.$company->name.'" updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return back()->with("success",'Company "'.$company->name.'" deleted!');
    }
}
