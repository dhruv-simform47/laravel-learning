<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function getUser($name = null)
    {
        return view('base',["name"=>$name]);
    }

    function handleAdmin()
    {
        return view("admin.login");
    }
}
