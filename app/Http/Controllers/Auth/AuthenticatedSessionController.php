<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\LoginNotification;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\Facades\{Auth, URL};
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(['email' => 'required|string|email']);

        $user = User::query()->where(['email' => $request->input('email')])->first();

        if (is_null($user)) {
            return back()->withErrors(['email' => 'No matching account found.']);
        }

        $link = URL::temporarySignedRoute(
            name: 'login.token',
            expiration: now()->addMinutes(5),
            parameters: ['user' => $user->id],
        );

        $user->notify(new LoginNotification($link));

        return back()->with(['status' => 'Please check your email for token.']);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
