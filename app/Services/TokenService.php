<?php


namespace App\Services;


use App\Models\Token;
use Illuminate\Support\Str;

class TokenService
{
    const TOKEN_EXPIRED_IN = 45; //minutes

    public function generate()
    {
        $Token = Token::create([
            'token' => Str::random(64)
        ]);

        return $Token->token;
    }

    public function validate(string $token): bool
    {
        return Token::query()
            ->where('token', $token)
            ->where('created_at', '>', now()->subMinutes(self::TOKEN_EXPIRED_IN))
            ->exists();
    }

    public function remove(string $token):void
    {
        Token::query()->where('token', $token)->delete();
    }
}
