<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Support\Facades\Storage;

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

        if (count(User::where('email', $request->get('email'))->get()) == 0) {
            return back()->with('error', 'Email tidak ditemukan! Silahkan registrasi');
        }

        if (Auth::attempt([
            'email'     => $request->get('email'),
            'password'  => $request->get('password')
        ], $remember)) {
            $avatar_path = storage_path() . '/app/profile/avatar-' . Auth::user()->id . '.png';

            if (!File::exists($avatar_path)) {

                // if not we generate one
                Storage::disk('local')->makeDirectory('public/profile/');
                Avatar::create(Auth::user()->name)->save('storage/profile/avatar-' . Auth::user()->id . '.png', 100);
                $avatar_path = storage_path() . '/app/profile/avatar-' . Auth::user()->id . '.png';
            }

            $request->session()->regenerate();

            return redirect('/')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Login gagal! Silahkan coba lagi');
    }
}
