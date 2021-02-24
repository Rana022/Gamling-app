<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    public function date()
    {
        return $this->belongsTo(Date::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function players()
    {
        return $this->belongsToMany(Player::class);
    }
}
