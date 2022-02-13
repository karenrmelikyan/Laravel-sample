<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserAuthRequest;
use App\Http\Requests\Auth\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    /**
     * @return Renderable
     */
    public function showRegistrationForm(): Renderable
    {
        return view('auth.register');
    }

    /**
     * @param UserRegistrationRequest $request
     * @return RedirectResponse
     */
    public function register(UserRegistrationRequest $request): RedirectResponse
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        Auth::login($user);

        return redirect('/dashboard_categories');
    }

    /**
     * @return Renderable
     */
    public function showLoginForm(): Renderable
    {
        return view('auth.login');
    }

    /**
     * @param UserAuthRequest $request
     * @return RedirectResponse
     */
    public function login(UserAuthRequest $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials) && $user = Auth::user()) {
            Auth::login($user);
        }

        return redirect('/dashboard_categories');
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('root');
    }

}
