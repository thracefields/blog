<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index()
    {
        return redirect()->route('manage.dashboard');
    }

    public function dashboard()
    {
        return view('manage.dashboard');
    }
}
