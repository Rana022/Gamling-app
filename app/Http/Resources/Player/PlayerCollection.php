<?php

namespace App\Http\Resources\Player;

use App\Http\Resources\Score\ScoreResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'country' => $this->country,
            'age' => $this->age,
            'spatialist' => $this->spatialist,
            'details' => [
                'show' => route('players.show', $this->id)
            ]  
        ];
    }
}
