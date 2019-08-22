<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Services\GameService;
use Illuminate\Http\Request;

class GameController extends Controller
{
    private $service;

    /**
     * GameController constructor.
     * @param GameService $gameService
     */
    public function __construct(GameService $gameService)
    {
        $this->service = $gameService;
    }

    /**
     * @param Link $link
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Link $link)
    {
        return view('game', compact('link'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function rate(Request $request)
    {

        $rand = rand(1, 1000);

        $notEven = $this->service->evenOrNotEven($rand);

        $winAmount = 0;

        if (!$notEven) {
            $winAmount = $this->service->winAmount($rand);
        }

        $this->service->saveRate($request->link, $rand, $winAmount);

        return response()->json(['lose' => $notEven, 'number' => $rand, 'win' => $winAmount]);

    }

    /**
     * @param Request $request
     * @return |null
     */
    public function regenerateLink(Request $request)
    {

        $newLink = $this->service->regenerateLink($request->link);

        if (is_null($newLink)) abort(404);

        return $newLink;

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function history(Request $request)
    {

        $history = $this->service->getHistory($request->link);

        return response()->json($history);

    }


    /**
     * @param Link $link
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deactivate(Link $link)
    {
        $link->delete();

        return response()->json([]);
    }


}
