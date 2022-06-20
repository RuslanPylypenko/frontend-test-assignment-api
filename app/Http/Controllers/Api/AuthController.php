<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TokenService;

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
