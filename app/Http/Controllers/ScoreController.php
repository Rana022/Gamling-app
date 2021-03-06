<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Resources\Score\ScoreResource;
use Symfony\Component\HttpFoundation\Response;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Player $player)
    {
        return new ScoreResource($player->score);
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
    public function store(Request $request, Player $player)
    {
        $request->validate([
            'run' => 'required|min:0|max:400',
            'wicket' => 'required|min:0|max:22',
            'catch' => 'required|min:0|max:22',
        ]);
        if($player->score_id == null){
            $score = new Score();
            $score->run = $request->run;
            $score->wicket = $request->wicket;
            $score->catch = $request->catch;
            $score->player_score = 4;
            $score->save();
            $player->score_id = $score->id;
            $player->save();
            return response([
                'data' => new ScoreResource($score)
             ], Response::HTTP_CREATED);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }
}
