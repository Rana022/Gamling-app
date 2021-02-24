<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Score;
use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'score_id' => function(){
                return Score::all()->random();
            },
            'name' => $this->faker->name,
            'country' => $this->faker->word,
            'age' => rand(20,45),
            'spatialist' => $this->faker->randomElement(array ('batsman','blower','allrounder'))
        ];
    }
}
