<?php

namespace App\Services;

use App\Models\Link;
use App\Models\User;
use App\Traits\LinkTrait;

class AuthService
{
    use LinkTrait;


    public function createUserAndLink($dataUser)
    {

        $user = User::create($dataUser);

        $link = Link::create(['id' => $this->linkGeneration(), 'user_id' => $user->id]);

        return $link->id;

    }



}