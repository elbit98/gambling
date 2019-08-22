<?php

namespace App\Services;

use App\Traits\LinkTrait;
use App\Models\GameHistory;
use App\Models\Link;
use App\Models\User;

class GameService
{
    use LinkTrait;

    /**
     * @param $link
     * @param $rand
     * @param $amount
     */
    public function saveRate($link, $rand, $amount)
    {

        $link = Link::find($link);

        if ($link != null) {

            GameHistory::create([
                'user_id' => $link->user_id,
                'rand' => $rand,
                'amount' => $amount
            ]);
        }

    }

    /**
     * @param $number
     * @return float
     */
    public function winAmount($number)
    {

        if ($number > 900) return $this->percent($number, 0.70);
        if ($number > 600) return $this->percent($number, 0.50);
        if ($number > 300) return $this->percent($number, 0.30);
        if ($number < 300) return $this->percent($number, 0.10);

    }

    /**
     * @param $number
     * @return bool
     */
    public function evenOrNotEven($number)
    {
        return ($number % 2) ? true : false;
    }

    /**
     * @param $number
     * @param $percent
     * @return float
     */
    public function percent($number, $percent)
    {
        $number_percent = $number * $percent;

        return round($number_percent, 2);
    }

    /**
     * @param $id_link
     * @return mixed
     */
    public function getHistory($id_link)
    {

        $link = Link::find($id_link);

        $history = GameHistory::select(['rand', 'amount'])->where('user_id', $link->user_id)->take(3)->orderBy('id', 'desc')->get();

        return $history;

    }

    /**
     * @param $oldLink_id
     * @return |null
     */
    public function regenerateLink($oldLink_id)
    {

        $link = Link::find($oldLink_id);

        if ($link) {
            $link->update(['id' => $this->linkGeneration()]);
            return $link->id;
        } else {
            return null;
        }

    }


}