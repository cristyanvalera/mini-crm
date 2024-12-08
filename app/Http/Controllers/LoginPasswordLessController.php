<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\Facades\Auth;

class LoginPasswordLessController extends Controller
{
    public function __invoke(Request $request, User $user): RedirectResponse
    {
        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }
}
