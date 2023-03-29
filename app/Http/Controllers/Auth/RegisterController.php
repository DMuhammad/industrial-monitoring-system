<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravolt\Avatar\Facade as Avatar;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.register', ['title' => 'Register']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = User::create([
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'password'  => bcrypt($request->get('password'))
        ]);

        if ($user) {
            Avatar::create($user->name)->save('storage/profile/avatar-' . $user->id . '.png', 100);

            // redirect to login and bring message success
            return redirect()->route('login.index')
                ->with('success', 'Register berhasil! Silahkan login');
        } else {
            return back()->with('error', 'Register gagal! Silahkan coba lagi');
        }

    }
}