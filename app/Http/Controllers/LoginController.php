<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function form($ability, $arguments = [])
    {
        return view('login', ['title' => 'Login Page']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->home()->with(['success'=> 'You are logout!']);;
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {

            return redirect()->home()->with(['success'=> 'Hello!']);
        }
        return redirect()->to(route('registrationform'));
    }

    public function registrationForm ()
    {
        return Inertia::render('Public/Singup', ['title' => 'Регистрация']);
    }
    public function registration (RegistrationRequest $request)
    {

        $vaidated = $request->validated();
        if ($request->hasFile('avatar')) {
            $date = date('Y-m-d');
            $vaidated['avatar'] = $request->file('avatar')->store("img/{$date}");
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
            'avatar' => $vaidated['avatar'] ?? ''
        ]);
        Auth::login($user);
        return redirect()->home()->with('success',  "User $request->name was register!");
    }

}
