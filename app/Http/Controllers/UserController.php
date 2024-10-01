<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }



    public function loginCheck(Request $req)
    {
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {

            if (Auth::user()->is_admin == 1) {
            
            
            Alert::success('Success', 'Admin login successfully');
                return redirect()->route('dashboard');

            } else {
                Alert::success('Success', 'User login successfully');
                return redirect()->route('home');

            }
        } else {

            Alert::error('Oops !', 'Email or Password are wrong');
            return redirect()->back();
        }
    }





    // public function loginCheck(Request $req)
    // {
    //     if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
    //         return redirect()->route('home');
    //     } else {
    //         return redirect()->back(); 
    //     }
    // }
    public function singup()
    {
        return view('singup'); 
    }
    public function singupData(Request $req)
    {
        $data['name'] = $req->name; 
        $data['email'] = $req->email;
        $data['phone'] = $req->phone;
        $data['password'] = Hash::make($req->password);

        User::create($data);
        
        Alert::success('Singup', 'Singup successfully');

        return redirect()->route('login');
    }

   public function logout()
{
        Auth::logout();


        Alert::success('logout', 'logout successfully');

        return redirect()->back();
    }
}
