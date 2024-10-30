<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use LaravelJsonApi\Core\Document\Error;
use GuzzleHttp\Exception\ClientException;
use LaravelJsonApi\Core\Responses\ErrorResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class MeController extends Controller
{
       /**
     * @param Request $request
     * @return JsonResponse
     */
    public function readProfile(Request $request){
        Log::info('Read Profile Endpoint Hit');

        // Get the authenticated user's ID
        $userId = auth()->id();
        if (!$userId) {
            Log::warning('User not authenticated');
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        Log::info('User ID: ' . $userId);

        // Fetch user data using the DB query builder
        $user = DB::table('users')->where('id', $userId)->first();

        if (!$user) {
            Log::warning('User not found');
            return response()->json(['error' => 'User not found'], 404);
        }

        Log::info('Returning user data for ID: ' . $userId);
        return response()->json($user, 200); // Return user data
    }
    public function updateProfile(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'company_name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'pin' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'bank' => 'required|string|max:255',
        'iban' => 'required|string|max:255',
        'bic' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . Auth::id(),
        
    ]);

    // Get the authenticated user
    $user = Auth::user();

    // Update the user's name
    $user->name = $request->input('name');
    $user->company_name = $request->input('company_name');
    $user->address = $request->input('address');
    $user->pin = $request->input('pin');
    $user->city = $request->input('city');
    $user->phone = $request->input('phone');
    $user->bank = $request->input('bank');
    $user->iban = $request->input('iban');
    $user->bic = $request->input('bic');
    $user->email = $request->input('email');
   

    // Save the changes
    $user->save();

    // Return a simple JSON response with success message and updated user data
    return response()->json([
        'message' => 'Profile updated successfully.',
        'user' => $user
    ], 200);
}



     /**
     * Update the specified resource.
     * Not named update because it conflicts with JsonApiController update method signature
     *
    
     */
   

      /**
     * Parse headers to collapse internal arrays
     * TODO: move to helpers
     *
     * @param array $headers
     * @return array
     */
    protected function parseHeaders($headers)
    {
        return collect($headers)->map(function ($item) {
            return $item[0];
        })->toArray();
    }
}
