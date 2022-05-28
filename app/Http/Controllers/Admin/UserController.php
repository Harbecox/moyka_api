<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $data['users'] = User::query()->whereNot("role",User::ROLE_ADMIN)->paginate(20);
        return view("dashboard.user.index",$data);
    }

    public function create()
    {
        $data['user'] = new User();
        $data['action'] = route("admin.user.store");
        $data['method'] = "post";
        return view("dashboard.user.form",$data);
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->validated());
        return response()->redirectToRoute("admin.user.index")
            ->with("success",'Company "'.$user->name.'" created!');
    }


    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        $data['user'] = $user;
        $data['action'] = route("admin.user.update",$user->id);
        $data['method'] = "put";
        return view("dashboard.user.form",$data);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());
        return response()->redirectToRoute("admin.user.index")->with("success",'User "'.$user->name.'" updated!');
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
