<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Game;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\Game\GameResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\Player\PlayerResource;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Player\PlayerCollection;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allGames()
    {
        return GameResource::collection(Game::all());
    }
    public function index(Date $date)
    {
        return GameResource::collection($date->games);
    }
    public function gameplayers(Game $game)
    {
       return PlayerCollection::collection($game->players);
    }
    public function gameusers(Game $game)
    {
       return UserResource::collection($game->users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'game' => 'required|min:8',
        ]);
        $game = new Game();
        $game->date_id = $request->date;
        $game->name = $request->game;
        $game->slug = Str::slug($game->name);
        $game->about = $game->about;
        $game->save();
        return response([
            'data' => new GameResource($game)
         ], Response::HTTP_CREATED);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
       $game->delete();
       return response(Null, Response::HTTP_NO_CONTENT);
    }
}
