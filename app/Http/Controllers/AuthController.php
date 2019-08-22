<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\AuthService;

class AuthController extends Controller
{

    private $service;

    /**
     * GameController constructor.
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->service = $authService;
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRequest $request)
    {

        $link_id = $this->service->createUserAndLink($request->all());

        return response()->json(['link' => $link_id]);
    }

}
