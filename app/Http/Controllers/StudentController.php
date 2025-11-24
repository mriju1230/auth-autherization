<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function showLogin(){
        return view('student.login');
    }

    public function showRegister(){
        return view('student.register');
    }
    public function register(Request $request){

        // validation
        $request->validate([
            "name" => "required",
            "email" => "required|unique:students",
            "cell" => "required|unique:students",
            "location" => "required",
            "skill" => "required",
            "password" => "required|confirmed",
        ]);

        // file upload
        $filename = '';
        if($request ->hasFile('photo')){
            $filename = $this->fileUpload($request->file('photo'), 'media/student/');
        }

        // data store
        Student::created([
            "name"          => $request->name,
            "email"         =>  $request->email,
            "cell"          =>  $request->cell,
            "location"      =>  $request->skill,
            "skill"         =>  $request->location,
            "photo"      =>  $filename,
            "password"      =>  Hash::make($request->password),
        ]);


        // return back
        return back() -> with('success', 'Student data created successfully!');

    }

    public function login(Request $request){
        //validation
        $credientials = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);
        
        //auth check 
        if(Auth::guard('student') -> attempt($credientials)){
            return redirect('/student-profile');
        }
        
        // return back
        return back();
    }

    public function logout(){
        Auth::guard('student') -> logout();
        return redirect('/student-login');
    }
}
