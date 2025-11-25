<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function showLogin(){
        return view('staff.login');
    }

    public function showRegister(){
        return view('staff.register');
    }

    public function profile(){
        return view('staff.profile');
    }

    public function account(){
        return view('account.dashboard');
    }
    
    public function register(Request $request){

        // validation
        $request->validate([
            "name" => "required",
            "username" => "required|unique:staff",
            "email" => "required|unique:staff",
            "cell" => "required|unique:staff",
            "password" => "required|confirmed",            
            "role" => "required",
        ]);

        // file upload
        $filename = '';
        if($request ->hasFile('photo')){
            $filename = $this->fileUpload($request->file('photo'), 'media/staff/');
        }

        // data store
        Staff::create([
            "name"          => $request->name,
            "username"      => $request->username,
            "email"         =>  $request->email,
            "cell"          =>  $request->cell,
            "role"          =>  $request->role,
            "photo"         =>  $filename,
            "password"      =>  Hash::make($request->password),
        ]);


        // return back
        return back() -> with('success', 'Staff data created successfully!');

    }

    public function login(Request $request){
        //validation
        $credientials = $request->validate([
            "email" => "required|email|exists:staff",
            "password" => "required",
        ],[
            "email.exists" => "Email not found!"
        ]);
        
        //auth check 
        if(Auth::guard('staff') -> attempt($credientials)){
            return redirect('/staff-profile');
        }
        
        // return back
        return back();
    }

    public function logout(){
        Auth::guard('staff') -> logout();
        return redirect('/staff-login');
    }
    
}
