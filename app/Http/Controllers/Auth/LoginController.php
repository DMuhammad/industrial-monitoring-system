<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login', ['title' => 'Login']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $remember = $request->has('remember') ? true : false;
        $this->validate($request, [
            'email'     => ['required', 'string', 'email:dns'],
            'password'  => ['required', 'string', 'min:8']
        ]);
        if (Auth::attempt([
            'email'     => $request->get('email'),
            'password'  => $request->get('password')
        ], $remember)) {
            $request->session()->regenerate();

            return redirect('/')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Login gagal! Silahkan coba lagi');
    }
}
