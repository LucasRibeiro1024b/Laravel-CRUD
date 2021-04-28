<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        if (! Auth::attempt(request(['email', 'password']))) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('view/livro/livro-view');

    }

    public function createView() {
        return view('new/user/user-new');
    }

    public function create(Request $request) {

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect()->route('livro.get.view');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home.get.view');
    }
}
