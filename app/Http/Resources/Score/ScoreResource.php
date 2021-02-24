<?php

namespace App\Http\Resources\Score;

use Illuminate\Http\Resources\Json\JsonResource;

class ScoreResource extends JsonResource
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
            'run' => $this->run,
            'wicket' => $this->wicket,
            'catch' => $this->catch,
            'player_score' => $this->player_score,
        ];
    }
}
