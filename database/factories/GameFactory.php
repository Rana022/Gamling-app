<?php

namespace Database\Factories;

use App\Models\Date;
use App\Models\Game;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $game = $this->faker->randomElement(array ('INDvsBD','AUSvsBD','ENDvsBD'));
        return [
            'date_id' => function(){
                 return Date::all()->random();
            },
            'name' => $game,
            'slug' => Str::slug($game),
        ];
    }
}
