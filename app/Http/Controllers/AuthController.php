<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Link;
use App\Models\User;

class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {

        $user = User::create($request->all());

        $link = Link::create(['id' => $this->linkGeneration(), 'user_id' => $user->id]);

        return response()->json(['link' => $link->id]);
    }

}
