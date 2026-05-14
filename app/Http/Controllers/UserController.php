<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function getUser($name = null)
    {
        return view('base',["name"=>$name]);
    }

    function getLogin()
    {
        return view("admin.login");
    }
    function login(Request $request)
    {
        $email=$request->email;
        return response()->json([
        "status" => "success",
        "email" => $email
    ]);
    }
}
