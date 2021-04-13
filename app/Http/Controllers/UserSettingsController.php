<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSettingsController extends Controller
{
    public function editPassword()
    {
        $user = Auth::user();
        return view('users.settings.password')->withUser($user);
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $oldPassword = $request->old_password;
        if(Hash::check($oldPassword, Auth::user()->password)) {
            $newPassword = $request->new_password;
            Auth::user()->password = Hash::make($newPassword);
            return redirect()->back()->with('success', 'Промените са запазени!');
        } else {
            return redirect()->back()->with('danger', 'Въведената парола не съвпада с текущата! Моля, опитайте пак!');
        }
    }
}
