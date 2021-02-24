<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Resources\Player\PlayerResource;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Player\PlayerCollection;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PlayerCollection::collection(Player::all());
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
            'player_name' => 'required|max:22',
            'player_country' => 'required|max:22',
            'player_spatiality' => 'required|max:22',
        ]);
        $player = new Player();
        $game_id = $request->game;
        $player->name = $request->player_name;
        $player->country = $request->player_country;
        $player->spatialist = $request->player_spatiality;
        $player->save();
        $player->games()->attach($game_id);
        return response([
            'data' => new PlayerResource($player)
         ], Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return new PlayerResource(Player::findOrFail($player->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
    }
    public function detachPlayer(Request $request, Player $player)
    {
        $player->games()->detach($request->game_id);
    }
}
