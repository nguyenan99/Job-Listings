<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function index()
    {
        return view('layouts.admin',['route_name' => 'Home-Admin']);
    }
}
