<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Image;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $judul = "My Profile";
        return view('profile.show', compact('judul'));
    }

    public function pass_submit(Request $request)
    {
        $this->validate($request, [
            'password' => ['required', 'confirmed', Password::defaults()],
            'old_password' => 'required',
        ]);

        $user = auth()->user();
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Old password do not match']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully');
    }

    public function update_profile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
        ]);

        $user = auth()->user();
        $user->update($request->all());

        return redirect()->back()->with('success', 'Profile Updated');
    }
}
