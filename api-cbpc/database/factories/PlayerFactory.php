<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'birthday' => $this->faker->date(),
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'uf' => $this->faker->stateAbbr,
            'phone' => $this->faker->phoneNumber,
            'cpf' => null,
            'transfer_code' => $this->faker->randomNumber(8),
            'avatar_path' => $this->faker->imageUrl(),
            'status' => 1,
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
