<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\SubriptionRequest;
use App\Http\Resources\API\SubscriptionResource;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    function index(){
        $user = \Auth::user();
        return $this->response(SubscriptionResource::collection($user->subscriptions));
    }

    function show($id){
        $user = \Auth::user();
        $subscription = $user->subscriptions()
            ->where("id",$id)
            ->firstOrFail();
        return $this->response(SubscriptionResource::make($subscription));
    }

    function create(SubriptionRequest $request){
        $data = $request->only(["pack_id"]);
        $subscription = \Auth::user()->subscriptions()->create($data);
        return $this->response(SubscriptionResource::make($subscription));
    }
}
