<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Str;
use Hash;
use Session;

use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(20);
        return view('manage.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('manage.users.create')->withRoles($roles);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateWith([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password_options' => 'required',
            'password' => 'sometimes|min:6'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password_options == 'auto') {
            $str = Str::random(10);
            $user->password = Hash::make($str);
        } elseif ($request->password_options == 'manual') {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if ($request->roles) {
            $user->syncRoles(explode(',', $request->roles));
        }

        if ($request->password_options == 'auto') {
            Session::flash('success', 'Успешно създадохте потребител. Генерираната парола е ' . $str . '.');
            return redirect()->route('users.index');
        }

        Session::flash('success', 'Успешно създадохте нов потребител!');
        return redirect()->route('users.show', $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('manage.users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::with('roles')->findOrFail($id);
        return view('manage.users.edit')->withUser($user)->withRoles($roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateWith([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password_options' => 'required',
            'password' => 'sometimes|min:6'
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password_options == 'auto') {
            $str = Str::random(10);
            $user->password = Hash::make($str);
        } elseif ($request->password_options == 'manual') {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if($request->roles) {
            $user->syncRoles(explode(',', $request->roles));
        } else {
            $user->syncRoles([]);
        }

        if($request->password_options == 'auto') {
            Session::flash('success', 'Промените са запазени! Новата парола е ' . $str . '.');
            return redirect()->route('users.index');
        }

        Session::flash('success', 'Промените са запазени!');
        return redirect()->route('users.show', $user->id);
    }
}
