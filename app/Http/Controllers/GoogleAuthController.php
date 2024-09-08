<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    // Redirect the user to the Google authentication page
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle the callback from Google
    public function callbackGoogle()
    {
        try {
            // Retrieve the user from Google
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Find the user by Google ID or email
            $user = User::where('google_id', $googleUser->getId())
                        ->orWhere('email', $googleUser->getEmail())
                        ->first();

            // If the user doesn't exist, create a new one
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(uniqid()), // Create a unique password
                ]);
            } else {
                // If the user exists but has no Google ID, update it
                if (!$user->google_id) {
                    $user->update(['google_id' => $googleUser->getId()]);
                }
            }

            // Log the user in
            Auth::login($user);

            // Redirect the user to the dashboard
            return redirect()->intended('dashboard');

        } catch (\Exception $e) {
            // If there is an error, redirect to the login page with an error message
            return redirect('/login')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
