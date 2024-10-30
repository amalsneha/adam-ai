<?php
namespace App\Http\Controllers\api\v2\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify($id)
    {
        // Find the user by their ID
        $user = User::find($id);

        if ($user) {
            // Check if the user is already verified
            if ($user->status == 1) {
                return response()->json([
                    'message' => 'Your email address is already verified.',
                    'redirect' => url('http://localhost:8080/'), // Redirect URL
                    'user' => $user,
                ]);
            }

            // Update the user's status to verified
            $user->status = 1; // Assuming 'status' is the column you want to update
            $user->save();

            // Return a confirmation message with redirect URL
            return redirect('http://localhost:8080/')->with('message', 'Your email address has been verified.');
        }

        return response()->json([
            'error' => 'User not found.'
        ], 404);
    }
}
