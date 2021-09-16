<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $usersIDs = DB::table('users')->pluck('id');
        $immeubleIDs = DB::table('immeubles')->pluck('id');

        return [
            'user_id' => $this->faker->randomElement($usersIDs),
            'immeuble_id' => $this->faker->randomElement($immeubleIDs),
            'content' => $this->faker->text(100),
        ];
    }
}
