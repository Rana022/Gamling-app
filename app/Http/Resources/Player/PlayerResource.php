<?php

namespace App\Http\Resources\Player;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'game_id' => $this->game_id,
            'score_id' => $this->score_id,
            'name' => $this->name,
            'country' => $this->country,
            'age' => $this->age,
            'spatialist' => $this->spatialist,
            'player_score'=>[
                'score' => route('score.index', $this->id)
            ]
        ];
    }
}
