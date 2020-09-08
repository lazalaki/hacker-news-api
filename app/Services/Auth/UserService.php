<?php


namespace App\Services\Auth;

use App\User;
use Exception;
use PharIo\Manifest\Email;
use Illuminate\Support\Str;
use App\Services\Email\EmailService;

class UserService
{

    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }


    public function register($userData)
    {
        $user = new User();
        $user->name = $userData['name'];
        $user->email = $userData['email'];
        $user->token = Str::random(30);
        $user->password = bcrypt($userData['password']);

        try {
            $user->save();
            return response()->json([], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 400);
        }

        $this->emailService->sendRegistrationEmail($user->email, $user->token, $user->name);
    }



    public function login($userData)
    {
        $token = auth()->attempt($userData);

        if (!$token) {
            throw new Exception("Bad credientals. Please try again");
        }

        if (!auth()->user()->is_active) {
            throw new Exception("Please got to your email to activate account");
        }

        return response()->json([
            'token' => $token,
            'user' => auth()->user()
        ]);
    }



    public function activateAccount($token)
    {
        $user = User::where('token', $token)->firstOrFail();

        $user->token = '';
        $user->is_active = true;

        try {
            $user->save();
        } catch (Exception $e) {
            throw new Exception("Account is already activated");
        }
    }
}
