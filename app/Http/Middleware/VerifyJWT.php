<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;

class VerifyJWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            JWT::decode($request->bearerToken(), env('JWT_KEY'), ['HS256']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getCode().': '.$e->getMessage()
            ], 401);
        }
        return $next($request);
    }

}
