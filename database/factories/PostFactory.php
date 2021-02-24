<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->title;
        return [
            'user_id' => function(){
                return User::all()->random();
            },
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->paragraph
            
        ];
    }
}
