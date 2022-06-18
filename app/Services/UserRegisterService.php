<?php


namespace App\Services;


use App\Models\User;

class UserRegisterService
{
    public function register($data): User
    {

        $this->guardUserExists($data);

        /** @var User $user */
        $user = User::make($data);
        $user->position()->associate($data['position_id']);
        $user->save();

        return $user;
    }


    private function guardUserExists($data): void
    {
        $userExists = User::query()
            ->where('phone', $data['phone'])
            ->orWhere('email', $data['email'])
            ->exists();
        if ($userExists) {
            throw new \LogicException('User with this phone or email already exist', 409);
        }
    }
}
