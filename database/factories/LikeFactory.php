<?php

namespace Database\Factories;

use App\Models\Replay;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => function(){
                return User::all()->random();
            },
            'reply_id' => function(){
                return Replay::all()->random();
            }
        ];
    }
}
