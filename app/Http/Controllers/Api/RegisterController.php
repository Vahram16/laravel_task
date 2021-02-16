<?php

namespace App\Http\Controllers\Api;

use App\Events\VerificationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    public User $us;

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $validated['verification_code'] = sha1(time());
        $validated['api_token'] = Str::random(60);
        $user = User::create($validated);
        if ($user) {
            VerificationEvent::dispatch($user);
        }

        return $this->respondWithNoContent('Account created successfully. Please verify');
    }
}
