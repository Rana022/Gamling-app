<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'role' => $this->role->name,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'owngames' => [
                'data' => route('user.games', $this->id)
            ],
            'ownplayers' => [
                'data' => route('user.players', $this->id)
            ]
        ];
    }
}
