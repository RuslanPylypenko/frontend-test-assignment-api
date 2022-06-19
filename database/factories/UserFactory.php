<?php

namespace Database\Factories;

use App\Services\UserRegisterService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

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
        $userRegisterService = new UserRegisterService();
        $UploadedFile = new UploadedFile(public_path('images/users/handsome-man-avatar.jpeg'), 'm');

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber,
            'photo' => $userRegisterService->processAvatar($UploadedFile)
        ];
    }
}
