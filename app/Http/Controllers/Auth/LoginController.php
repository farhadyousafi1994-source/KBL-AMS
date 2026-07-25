<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirects authenticated users to the ERP dashboard.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
     * Normalize login credentials before Laravel attempts authentication.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return [
            'email' => trim((string) $request->input($this->username())),
            'password' => (string) $request->input('password'),
        ];
    }

    /**
     * Attempt to log the user in, including support for legacy plain-text
     * passwords already stored in older installations. When a legacy password
     * succeeds it is immediately upgraded to Laravel's secure hash format.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        if ($this->guard()->attempt($this->credentials($request), $request->filled('remember'))) {
            return true;
        }

        $email = trim((string) $request->input($this->username()));
        $password = (string) $request->input('password');
        $user = User::where('email', $email)->first();

        if (! $user || ! hash_equals((string) $user->password, $password)) {
            return false;
        }

        $user->forceFill([
            'password' => Hash::make($password),
            'type' => trim((string) $user->type) ?: 'user',
        ])->save();

        Auth::guard()->login($user, $request->filled('remember'));

        return true;
    }
}
