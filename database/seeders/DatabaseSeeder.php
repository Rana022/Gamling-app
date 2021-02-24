<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Player;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

       \App\Models\Role::factory(1)->create();
        \App\Models\User::factory(10)->create();
         \App\Models\Post::factory(5)->create();
          \App\Models\Date::factory(2)->create();
           \App\Models\Game::factory(4)->create();
           \App\Models\Score::factory(22)->create();
            \App\Models\Player::factory(22)->create();




            $players = Player::all();
        \App\Models\Game::all()->each(function ($game) use ($players){
            $game->players()->attach(
              $players->random(22)->pluck('id')->toArray()
            );
     });

         $users = User::all();
        \App\Models\Game::all()->each(function ($game) use ($users){
            $game->users()->attach(
              $users->random(8)->pluck('id')->toArray()
            );
     });

       $players = Player::all();
     $users->each(function ($user) use ($players){
            $user->players()->attach(
              $players->random(22)->pluck('id')->toArray()
            );
     });

    }
}
