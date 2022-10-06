<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login2');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (auth()->user()->type == 'Developer') {
            return redirect()->route('developer.dashboard');
        }else if (auth()->user()->type == 'Admin') {
            return redirect()->route('admin.dashboard');
        }else if (auth()->user()->type == 'Akademik') {
            return redirect()->route('akademik.dashboard');
        }else if (auth()->user()->type == 'Keuangan') {
            return redirect()->route('keuangan.dashboard');
        }else if (auth()->user()->type == 'Sarpras') {
            return redirect()->intended(RouteServiceProvider::SARPRAS_HOME);
            // return redirect()->route('sarpras.dashboard');
        }else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        // return redirect()->intended(RouteServiceProvider::HOME);

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
