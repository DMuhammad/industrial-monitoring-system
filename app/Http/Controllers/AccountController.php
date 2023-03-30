<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        return view('pages.account.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            Alert::error('Gagal', 'Your current password does not matches with the password.');
            return redirect()->back()->with('error', 'Your current password does not matches with the password.');
        }

        if (strcmp($request->get('old_password'), $request->get('password')) == 0) {
            Alert::error('Gagal', 'New password cannot be same as your current password.');
            return redirect()->back()->with('error', 'New password cannot be same as your current password.');
        }

        $this->validate($request, [
            'old_password'  =>  ['required'],
            'password'      =>  ['required', 'string', 'min:8', 'confirmed']
        ]);

        // $user->update([
        //     'password'  => bcrypt($request->get('password'))
        // ]);

        User::whereId(auth()->user()->id)->update([
            'password'  =>  Hash::make($request->password)
        ]);

        Alert::success('Berhasil', 'Berhasil mengubah password');
        return redirect()->route('home');
        // if ($user) {
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
