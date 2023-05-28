<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'body' => $this->faker->text(),
            'slug'  => str_slug($title),
            'category_id' => function(){
                return Category::all()->random();
            },
            'user_id' => function(){
                return User::all()->random();
            }
        ];
    }
}
