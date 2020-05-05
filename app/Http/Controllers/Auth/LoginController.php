<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Github
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function github()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Github Redirect
     *
     *
     */
    public function githubRedirect()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::firstOrCreate([
            'email' => $githubUser->email,
        ], [
            'name' => $githubUser->name,
            'password' => Hash::make(Str::random(8))
        ]);

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }

    /**
     * Facebook
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Facebook Redirect
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function facebookRedirect()
    {
        $facebookUser = Socialite::driver('facebook')->user();

        $user = User::firstOrCreate([
            'email' => $facebookUser->email,
        ], [
            'name' => $facebookUser->name,
            'password' => Hash::make(Str::random(8))
        ]);

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }

    /**
     * Twitter
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function twitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Twitter Redirect
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function twitterRedirect()
    {
        $twitterUser = Socialite::driver('twitter')->user();

        $user = User::firstOrCreate([
            'email' => $twitterUser->email,
        ], [
            'name' => $twitterUser->name,
            'password' => Hash::make(Str::random(8))
        ]);

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }

    /**
     * Google
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Google Redirect
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function googleRedirect()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::firstOrCreate([
            'email' => $googleUser->email,
        ], [
            'name' => $googleUser->name,
            'password' => Hash::make(Str::random(8))
        ]);

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }
}
