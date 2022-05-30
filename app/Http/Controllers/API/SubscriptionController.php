<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\SubriptionRequest;
use App\Http\Resources\API\SubscriptionResource;
use App\Models\Company;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    function use_(Request $request){
        Log::info(json_encode($request->toArray()));
        $company_id = $request->get("company_id");
        foreach (\Auth::user()->subscriptions as $subscription){
            if($subscription->pack->companies->where("id",$company_id)->count() > 0){
                if($subscription->used < $subscription->count){
                    $subscription->used++;
                    $subscription->save();
                    return $this->response([]);
                }
            }
        }
        return $this->response([],400);
    }
}
