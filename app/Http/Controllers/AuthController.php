<?php

namespace App\Http\Controllers;

use App\Models\JWTModel;
use App\Models\User;
use App\Notifications\EmailVerification;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
     * Display the login view
     */
    public function loginView()
    {
        return view('auth.login');
    }
    /*
     * Display the login view
     */
    public function login(Request $request)
    {
        $data = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );

        try {
            // check if the user exist first
            $user = User::where('email', $data['email'])->firstOrFail();
            // check if he password match
            if (!Hash::check($data['password'], $user->password)) {
                return redirect()->back()->with("error", "nom d'utilisateur ou mot de passe incorect")->withInput();
            }
            // log in the user
            if (Auth::attempt($data)) {
                $request->session()->regenerate();
               
                return redirect()->route('dashboard.index')->with("message", "vous etes conecter!");
            }
            return redirect()->back()->with("error", "nom d'utilisateur ou mot de passe incorect")->withInput();
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "nom d'utilisateur ou mot de passe incorect!")->withInput();
        }
    }
    

    

    // logout the user
    public function logout(Request $request)
    {
        $name = Auth::user()->firstname;
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.login')->with('message', 'merci de votre passage monsieur ' . $name . ' à la prochaine');
    }
}