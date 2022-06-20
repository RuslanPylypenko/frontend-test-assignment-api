<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserRegisterService
{
    public function register($data): User
    {

        $this->guardUserExists($data);

        /** @var User $user */
        $user = User::make($data);
        $user->position()->associate($data['position_id']);
        $user->photo = $this->processAvatar($data['photo']);
        $user->save();

        return $user;
    }


    public function processAvatar($photo)
    {
        $img = Image::make($photo);
        $img->crop(70, 70);

        $hash = $photo->hashName('images/users');
        Storage::put('public/' . $hash, (string)$img->encode(null, 80));

        return $hash;
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
