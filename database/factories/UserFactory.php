<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserFactory extends Factory
{
protected $model = User::class;

public function definition(): array
{
return [
    'name' => $this->faker->name(),
    'email' => $this->faker->unique()->safeEmail(),
    'email_verified_at' => now(),
    'password' => bcrypt('password'),
    'remember_token' => \Str::random(10),

];
}

public function configure(): static
{
return $this->afterCreating(function (User $user) {
// Pode randomizar uma role se quiser, ou fixar uma específica
$role = Role::inRandomOrder()->first(); // aleatória entre as três
$user->assignRole($role);
});
}

public function unverified(): static
{
return $this->state(fn (array $attributes) => [
'email_verified_at' => null,
]);
}
}
