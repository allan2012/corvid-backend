<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{

    private $issued_at;
    private $server_name;
    private $not_before;
    private $expire;
    private $payload;

    public function __construct()
    {
        $this->issued_at = time();
        $this->server_name = config('name');
        $this->not_before = $this->issued_at;
        $this->expire = $this->not_before + 3000;


    }

    public function auth(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $this->payload = [
                "iss" => $this->server_name,
                "iat" => $this->issued_at,
                "nbf" => $this->not_before,
                "exp" => $this->expire,
                'user_data' => User::where('email',$email)->first()
            ];
            $jwt = JWT::encode($this->payload, env('JWT_KEY'));
            return response()->json([
                'status' => 'success',
                'token' => $jwt,
                'refresh_token' => $this->generateRefreshToken()
            ]);
        }
        return response()->json([
            'error' => 'Login Failed. Wrong username or password'
        ], 200);
    }

    private function generateRefreshToken() : string
    {
        $this->payload = [
            "iss" => $this->server_name,
            "iat" => $this->issued_at,
            "nbf" => $this->issued_at + 10,
            "exp" => $this->issued_at + 43200
        ];
        return JWT::encode($this->payload, env('JWT_KEY'));
    }
}
