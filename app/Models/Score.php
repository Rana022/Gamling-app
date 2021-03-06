<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $fillable = [
        'run',
        'catch',
        'wicket',
        'player_score'
    ];
    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
