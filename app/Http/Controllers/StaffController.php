<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Pest\Support\Str;

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
        $staffUser = Staff::create([
            "name"          => $request->name,
            "username"      => $request->username,
            "email"         =>  $request->email,
            "cell"          =>  $request->cell,
            "role"          =>  $request->role,
            "photo"         =>  $filename,
            "password"      =>  Hash::make($request->password),
        ]);

        // now add
        $staffUser ->activation_token = Str::random(40);
        $staffUser->save();

        // return back
        return back() -> with('success', 'Staff data created successfully!');

    }

    public function login(Request $request){
        //validation
        $credientials = $request->validate([
            "auth" => "required",
            "password" => "required",
        ]);
        
        // $credientials = $request->validate([
        //     "email" => "required|email|exists:staff",
        //     "password" => "required",
        // ],[
        //     "email.exists" => "Email not found!"
        // ]);

        // check login vars
        if(filter_var($credientials['auth'], FILTER_VALIDATE_EMAIL)){
            $credientials['email'] = $request->auth;
            unset($credientials['auth']);
        }else if(preg_match('/^[0-9]{11}$/', $request['auth'])){
            $credientials['cell'] = $request->auth;
            unset($credientials['auth']);
        }else{
            $credientials['username'] = $request->auth;
            unset($credientials['auth']);
        }
        
        //auth check 
        if(Auth::guard('staff') -> attempt($credientials)){
            return redirect('/staff-profile');
        }
        
        // Return back with error
        return back()->withErrors([
            'auth' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function logout(){
        Auth::guard('staff') -> logout();
        return redirect('/staff-login');
    }
    
}
