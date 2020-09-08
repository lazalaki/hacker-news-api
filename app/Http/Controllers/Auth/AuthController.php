<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\Auth\UserService;
use App\Services\Email\EmailService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function register(RegisterRequest $request)
    {
        
        $credientals = $request->only('name', 'email', 'password');
        
        return $this->userService->register($credientals);
    }


    public function login(Request $request)
    {
        $credientals = $request->only('email', 'password');

        return $this->userService->login($credientals);
    }


    public function activateAccount(Request $token)
    {
        return $this->userService->activateAccount($token);
    }
}
