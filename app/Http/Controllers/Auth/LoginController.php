<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated(Request $request, $user)
    {
        // return $user->role->name;
        // toast('Hai ' . $user->name . ', Anda Berhasil Login', 'success');

        // notify()->success('Hi ' . $request->name . ', welcome to codelapan');
        if ($user->jabatan->jabatan == 'Kepala Desa') { // do your magic here
            return redirect('/dashboard');
        } else if ($user->jabatan->jabatan == 'Sekretaris' || $user->jabatan->jabatan == 'user') {
            return redirect('/dashboard');
        }

        return redirect('/dashboard');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
