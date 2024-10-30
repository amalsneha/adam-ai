<?php

namespace App\Http\Controllers\Api\V2\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V2\Auth\LoginRequest;
use LaravelJsonApi\Core\Document\Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \App\Http\Requests\Api\V2\Auth\LoginRequest $request
     *
     * @return \Symfony\Component\HttpFoundation\Response|\LaravelJsonApi\Core\Document\Error
     * @throws \Exception
     */
    public function __invoke(LoginRequest $request): Response|Error
{
    // Retrieve the user by their email
    $user = DB::table('users')->where('email', $request->email)->first();

    // Check if the user exists and if their status is 1
    if (!$user || $user->status != 1) {
        return Error::fromArray([
            'title'  => Response::$statusTexts[Response::HTTP_UNAUTHORIZED],
            'detail' => 'Unauthorized: User status is not active.',
            'status' => Response::HTTP_UNAUTHORIZED,
        ]);
    }

    // Retrieve the OAuth client (password grant)
    $client = DB::table('oauth_clients')->where('password_client', 1)->first();

    // Create a request for the OAuth token
    $tokenRequest = Request::create(config('app.url') . '/oauth/token', 'POST', [
        'grant_type'    => 'password',
        'client_id'     => $client->id,
        'client_secret' => $client->secret,
        'username'      => $request->email,
        'password'      => $request->password,
        'scope'         => '',
    ]);

    /** @var \Illuminate\Http\Response $response */
    $response = app()->handle($tokenRequest);

    // Handle unsuccessful responses from the OAuth token request
    if ($response->getStatusCode() !== Response::HTTP_OK) {
        return Error::fromArray([
            'title'  => Response::$statusTexts[Response::HTTP_BAD_REQUEST],
            'detail' => $response->exception->getMessage(),
            'status' => Response::HTTP_BAD_REQUEST,
        ]);
    }

    // Return the successful OAuth token response
    return $response;
}
}

