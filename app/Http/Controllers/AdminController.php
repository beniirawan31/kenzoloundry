<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.Admin.index');
    }

    public function login(){
        return view('Admin.Session.AdminLogin');
    }

    public function register(){
        return view('Admin.Sesion.Adminregister');
    }
}
