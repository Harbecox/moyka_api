<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pack\PackStoreRequest;
use App\Http\Requests\Pack\PackUpdateRequest;
use App\Models\Company;
use App\Models\Pack;
use Illuminate\Http\Request;

class PackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['packs'] = Pack::query()->paginate(20);
        return view("dashboard.pack.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pack'] = new Pack();
        $data['companies'] = Company::all();
        $data['action'] = route("admin.pack.store");
        $data['method'] = "post";
        return view("dashboard.pack.form",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackStoreRequest $request)
    {
        $pack = Pack::create($request->validated());
        $pack->companies()->attach($request->get("companies",[]));
        return response()->redirectToRoute("admin.pack.index")
            ->with("success",'Pack "'.$pack->name.'" created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pack $pack)
    {
        $data['pack'] = $pack;
        return view("dashboard.pack.show",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pack $pack)
    {
        $data['pack'] = $pack;
        $data['companies'] = Company::all();
        $data['action'] = route("admin.pack.update",$pack->id);
        $data['method'] = "put";
        return view("dashboard.pack.form",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Pack  $pack
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PackUpdateRequest $request, Pack $pack): \Illuminate\Http\RedirectResponse
    {
        $pack->companies()->detach();
        $pack->companies()->attach($request->get("companies",[]));
        $pack->update($request->validated());
        return back()->with("success",'Pack "'.$pack->name.'" updated!');
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
