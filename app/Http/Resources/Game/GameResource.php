<?php

namespace App\Http\Resources\Game;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'player' => [
                'data' => route('game.players', $this->id)
            ],
            'users' => [
                'data' => route('game.users', $this->id)
            ]
        ];
    }
}
