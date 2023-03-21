<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravolt\Avatar\Avatar;
use Illuminate\Support\Facades\Storage;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = User::create([
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'password'  => bcrypt($request->get('password'))
        ]);

        if ($user) {
            // DIKERJAKAN AKHIR -- AVATAR
            // Storage::disk('local')->makeDirectory('public/users/' . $user->id);
            // $avatar = new Avatar();
            // $avatar->create($user->name)
            //     ->setDimension(100, 100)
            //     ->save(storage_path() . '/app/public/users/' . $user->id . '/generated_cover.png');

            // redirect to login and bring message success
            return redirect()->route('login.index')
                ->with('success', 'Silahkan Login');
        }
    }
}
