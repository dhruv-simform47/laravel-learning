<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function getStudents()
{
    $students=\App\Models\Student::all();
    return view('student',["data"=>$students]);
    }
    public function demoS(){
    return redirect('/home');
    }
}
