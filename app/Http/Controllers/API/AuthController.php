<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegisterRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        User::create($request->validated());
        $credentials = request(['email', 'password']);
        $token = auth()->guard("api")->attempt($credentials);
        return $this->response(['token' => $token]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);
        if (! $token = auth()->guard("api")->attempt($credentials)) {
            return $this->response([],401);
        }
        $data['token'] = $token;
        $data['user'] = \Auth::user();
        $data['company'] = Company::query()->where("user_id",$data['user']->id)->first();
        return $this->response($data);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return $this->response([]);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->response(['token' => auth()->refresh()]);
    }

}
