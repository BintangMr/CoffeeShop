<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show specified view.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function loginView()
    {
        return view('auth.login');
    }

    /**
     * Authenticate login user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        try {

            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return respSuccess([
                    "url" => route('admin.dashboard'),
                    "user" => Auth::user()
                ]);
            }

            return respNotFound("Username atau Password Salah",'Kesalahan');

        } catch (\Exception $e) {
            return respError($e->getMessage());
        }
    }

    /**
     * Logout user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
