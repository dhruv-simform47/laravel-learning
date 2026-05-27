<?php

namespace App\Http\Controllers;

use App\Rules\Checkage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUser($email = 'guest')
    {
        return view('base', ['email' => $email]);
    }

    public function getLogin()
    {
        return view('admin.login');
    }

    public function addUser(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.addUser');
        }
        $request->validate([
            'email' => 'required | email ',
            'password' => 'required | min=6 | max=15',
            'gender' => 'required',
            'city' => 'required',
            'lang' => 'required',
        ]);
        $email = $request->email;

        return response()->json(['status' => 'success', 'email' => $email]);
    }

    public function login(Request $request)
    {

        $email = $request->email;

        return response()->json([
            'status' => 'success',
            'email' => $email,
        ]);
    }

    public function addDetail(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('forms.addDetail');
        }

        if($request->input('age') == 25)
            {
                return redirect()->back()->withInput();
            }

        $request->validate([
            'name' => 'required',
            'email' => 'required | email ',
            'gender' => 'required | in:male,female',
            'city' => 'required |string | in:ahmedabad,baroda,surat',
            'lang' => 'required | array',
            'lang.*' => 'string | in:hindi,gujarati,english',
            'age' => ['integer', 'required', new Checkage],
        ],
            [
                'email.required' => 'email is required',
                'gender.required' => 'gender is required',
                'city' => 'city is required',
                'lang' => 'language is required',
            ]);

            // $data=[
            //     "message"=>"well done",
            //     "name"=>"dhruv",
            //     "age"=>25
            // ];
            // return response()->json($data,201);
        return $request;
    }

    public function user()
    {
        $users = DB::select('select * from users');

        return view('user', ['users' => $users]);
    }
}
