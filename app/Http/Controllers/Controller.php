<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function linkGeneration()
    {

        $randomLink = Str::random(10);
        $link = Link::find($randomLink);

        if ($link) {
            return $this->linkGeneration();
        }

        return $randomLink;

    }

}
