<?php

namespace App\Traits;

use App\Models\Link;
use Illuminate\Support\Str;

trait LinkTrait
{
    /**
     * @return string
     */
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