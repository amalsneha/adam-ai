<?php

namespace App\Http\Controllers\Api\V2\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V2\Auth\RegisterRequest;
use LaravelJsonApi\Core\Document\Error;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Api\V2\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;


class RegisterController extends Controller
{
        /**
     * Handle the incoming request.
     *
     * @param \App\Http\Requests\Api\V2\Auth\RegisterRequest $request
     *
     * @return \Symfony\Component\HttpFoundation\Response|\LaravelJsonApi\Core\Document\Error
     * @throws \Exception
     */
    public function __invoke(RegisterRequest $request): Response|Error
{
    // Create the user and hash the password
    $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => $request->password, // Hash the password
        'role'=>'admin',
        'status'=>0,
    ]);
    Mail::to($user->email)->send(new VerifyEmail($user));
    // Return a successful response with the created user
    return response()->json([
        'message' => 'User registered successfully',
        'user'    => $user, // Use the $user variable here
    ], 201); // 201 Created status code
}

}
