<?php


namespace App\Http\Controllers;




use App\Services\TokenService;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    private TokenService $tokenService;

    public function __construct(TokenService $tokenService)
    {
        $this->tokenService = $tokenService;
    }

    public function token()
    {
        return response()->json([
            'success' => true,
            'token' => $this->tokenService->generate()
        ]);
    }
}
