<?php

namespace App\Http\Controllers;

use App\Models\GameHistory;
use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function index(Link $link)
    {
        return view('game', compact('link'));
    }

    public function rate(Request $request)
    {

        $rand = rand(1, 1000);

        $notEven = $this->evenOrNotEven($rand);

        $winAmount = 0;

        if (!$notEven) {
            $winAmount = $this->winAmount($rand);
        }

        $this->saveRate($request->link, $rand, $winAmount);

        return response()->json(['lose' => $notEven, 'number' => $rand, 'win' => $winAmount]);

    }

    public function saveRate($link, $rand, $amount)
    {

        $link = Link::find($link);

        $user = User::find($link->user_id);

        GameHistory::create([
            'user_id' => $user->id,
            'rand'    => $rand,
            'amount'  => $amount
        ]);

    }

    public function winAmount($number)
    {

        if ($number > 900) return $this->percent($number, 0.70);
        if ($number > 600) return $this->percent($number, 0.50);
        if ($number > 300) return $this->percent($number, 0.30);
        if ($number < 300) return $this->percent($number, 0.10);

    }

    public function evenOrNotEven($number)
    {
        return ($number % 2) ? true : false;
    }

    public function percent($number, $percent)
    {
        $number_percent = $number * $percent;

        return round($number_percent, 2);
    }

    public function regenerateLink(Request $request)
    {

        $link = $request->link;

        $link = Link::find($link);

        if ($link) {
            $link->update(['id' => $this->linkGeneration()]);
            return $link->id;
        }

    }

    public function history(Request $request)
    {

        $link = $request->link;

        $link = Link::find($link);

        $history = GameHistory::select(['rand', 'amount'])->where('user_id', $link->user_id)->take(3)->orderBy('id', 'desc')->get();

        return response()->json($history);

    }


    public function deactivate(Link $link)
    {
        if ($link) $link->delete();

        return response()->json([]);
    }


}
