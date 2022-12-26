<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;

class AuthController extends Controller
{
    public function login()
    {
        $categories = Category::all();
        return view('auth.login', ['categories' => $categories]);
    }

    public function registration()
    {
        $countries = Country::all();
        $categories = Category::all();
        return view('auth.registration', ['countries' => $countries, 'categories' => $categories]);
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            session()->put('username', $credentials['email']);
            session()->put('password', $credentials['password']);

            if ($request->has('remember')) {
                Cookie::queue(Cookie::make('username', $credentials['email'], 120));
                Cookie::queue(Cookie::make('password', $credentials['password'], 120));
            }

            return redirect()->intended('/dashboard')
                ->withSuccess('Signed in');
        }

        $errors = new MessageBag(['password' => ['Wrong Password']]);

        return Redirect::back()->withErrors($errors);
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email:rfc,dns|unique:users',
            'passwords' => 'required|min:8',
            'confirm_password' => 'required|same:passwords',
            'gender' => 'required',
            'date_of_birth' => 'required|date|after:01/01/1900|before:today',
            'country_id' => 'required',
        ]);

        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['passwords']),
            'gender' => $data['gender'],
            'date_of_birth' => $data['date_of_birth'],
            'country_id' => $data['country_id'],
            'role' => 'user',
        ]);

        session()->flash('message', 'Registration Successful');

        return redirect('login');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();

        return redirect('login');
    }
}
