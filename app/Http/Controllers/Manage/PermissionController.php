<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Permission;
use Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('manage.permissions.index')->withPermissions($permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.permissions.create');
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
            'display_name' => 'required|max:255',
            'name' => 'required|max:255|alphadash|unique:permissions,name',
            'description' => 'sometimes|max:255'
        ]);
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();
        Session::flash('success', 'Успешно добавихте нов вид права!');
        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return view('manage.permissions.show')->withPermission($permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('manage.permissions.edit')->withPermission($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validateWith([
            'display_name' => 'required|max:255',
            'description' => 'sometimes|max:255'
        ]);

        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();
        Session::flash('success', 'Промените са запазени!');
        return redirect()->route('permissions.show', $permission->name);
    }

}
