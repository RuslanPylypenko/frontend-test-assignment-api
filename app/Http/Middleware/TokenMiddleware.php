<?php

namespace App\Http\Middleware;

use App\Services\TokenService;
use Closure;
use Illuminate\Http\Request;

class TokenMiddleware
{

    private TokenService $tokenService;

    public function __construct(TokenService $tokenService)
    {
        $this->tokenService = $tokenService;
    }


    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Token');

        if (!$this->tokenService->validate($token)) {
           return response()->json([
                "success" => false,
                "message" => 'The token expired.'
            ], 401);
        }

        $this->tokenService->remove($token);

        return $next($request);
    }
}
