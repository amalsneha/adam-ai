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
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class UserController extends Controller
{
      /**
     * @param Request $request
     * @return JsonResponse
     */

     public function addUser(Request $request)
     {
        $userId = auth()->id();
        if (!$userId) {
            Log::warning('User not authenticated');
            return response()->json(['error' => 'Unauthorized'], 401);
        }
         // Validate the incoming request data
         $validator = Validator::make($request->all(), [
             'fname' => 'required|string|max:255',
             'lname' => 'required|string|max:255',
             'uname' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
         ]);
 
         // Return validation errors if validation fails
         if ($validator->fails()) {
             return response()->json($validator->errors(), 400);
         }
 
         // Automatically generate a random password
         $password = Str::random(10); // You can change the length as needed
 
         // Create a new user
         $user=DB::table('users')->insert([
            'name' => $request->fname . ' ' . $request->lname,
            'email' => $request->email,
            'password' => bcrypt($password), // Hash the generated password
            'company_name' => $request->uname,
            'client_id' => $userId,
            'role' => 'user',
            'status' => '1',
            'created_at' => now(), // Add timestamps if necessary
            'updated_at' => now(),
        ]);
        Mail::raw("Welcome {$request->fname} {$request->lname}!\nYour account has been created. Here are your login details:\nEmail: {$request->email}\nPassword: {$password}\nYou can log in at: " . url('http://localhost:8080/Login'), 
        function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Your Account Has Been Created');
        });
 
         // Return a response with the user information and the generated password
         return response()->json([
             'message' => 'User created successfully.',
            
         ], 201);
     }
     public function getUser(Request $request)
{
    $userId = auth()->id();
    if (!$userId) {
        Log::warning('User not authenticated');
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    // Retrieve users associated with the logged-in user
    $users = DB::table('users')
        ->where('client_id', $userId)
        ->get();

    // Check if users exist
    if ($users->isEmpty()) {
        return response()->json(['message' => 'No users found for this client.'], 404);
    }

    // Return the list of users
    return response()->json($users, 200);
}
public function deleteUser($id)
{
    // Use a raw query to delete the user by ID
    $deleted = DB::table('users')->where('id', $id)->delete();

    // Check if a user was deleted
    if ($deleted) {
        return response()->json(['message' => 'User deleted successfully.'], 200);
    } else {
        return response()->json(['message' => 'User not found.'], 404);
    }
}
public function getUserById($id)
{
    

        // Fetch user data using the DB query builder
        $user = DB::table('users')->where('id', $id)->first();

        if (!$user) {
            Log::warning('User not found');
            return response()->json(['error' => 'User not found'], 404);
        }

        Log::info('Returning user data for ID: ' . $id);
        return response()->json($user, 200); // Return user data
}
public function updateUser(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'company_name' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'role' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);

    // Update the user's profile with the validated data
    $user->company_name = $request->input('company_name');
    $user->name = $request->input('name');
    $user->role = $request->input('role');
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
