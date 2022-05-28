<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\PackResource;
use App\Models\Pack;
use App\Models\Subscription;
use Illuminate\Http\Request;

class PackController extends Controller
{
    function index(): \Illuminate\Http\JsonResponse
    {
        $subscription_ids = \Auth::user()->subscriptions->map(function ($sub){
            return $sub->id;
        });
        $packs = Pack::query()->whereNotIn("id",$subscription_ids)->get();
        return $this->response(PackResource::collection($packs));
    }

    function show($id): \Illuminate\Http\JsonResponse
    {
        $pack = Pack::query()->where("id",$id)->with("companies")->firstOrFail();
        return $this->response(PackResource::make($pack));
    }
}
