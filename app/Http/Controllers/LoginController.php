<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        /*
        $email = $request->email;
        $senha = $request->senha;

        $credentials = $request->only($email, $senha);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('livros');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        */
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }

        return redirect()->intended('livros');
    }

    public function createView() {
        return view('userCreate');
    }

    public function create(Request $request) {
       /*
        $user = new User();
        $user->name = $request->nome;
        $user->email = $request->email;
        $user->password = $request->senha;
        $user->save();

        Auth::login($user);

        return redirect()->route('livros');
    */
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create(request(['name', 'email', 'password']));

        Auth::login($user);
        return redirect()->route('livros');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
