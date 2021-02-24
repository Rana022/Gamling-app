<?php

namespace Database\Factories;

use App\Models\Score;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Score::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'run' => rand(0, 150),
            'wicket' => rand(0, 6),
            'catch' => rand(0, 5),
            'player_score' => rand(5, 15)
        ];
    }
}
