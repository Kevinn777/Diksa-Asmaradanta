<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'jenis_kelamin' => 'laki-laki',
            'tanggal_lahir' => '19-10-2002',
            'nomor_hp' => '0851219598',
            'email' => $this->faker->unique()->safeEmail(),
            'jabatan' => 'pegawai',
            'status' => 'assessment',
            'email_verified_at' => now(),
            'password' => bcrypt(12341234), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
