<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Image;
use Session;
use Auth;
use Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index()
    {
        $currentUser = Auth::user();
        $profile = User::find($currentUser->id)->profile;
        return view('users.profiles.index')->withProfile($profile);
    }
    public function show(Profile $profile)
    {
        $user = $profile->user;
        return view('users.profiles.show')->withUser($user)->withProfile($profile);
    }

    public function edit(Profile $profile)
    {
        if (Auth::user()->id !== $profile->user->id) {
            abort(403);
        }

        return view('users.profiles.edit')->withProfile($profile);
    }

    public function update(Request $request, Profile $profile)
    {
        if (Auth::user()->id !== $profile->user->id) {
            return abort(403);
        }

        $this->validate($request, [
            'settlement' => 'max:30',
            'about_me' => 'max:255',
        ]);

        $currentUser = Auth::user();

        $profile = User::find($currentUser->id)->profile;
        $profile->about_me = $request->about_me;
        $profile->settlement = $request->settlement;
        $profile->save();

        Session::flash('success', 'Успешно редактирахте профила си!');
        return redirect()->route('profiles.show', $profile->slug);
    }
}
