<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    // Authorization
    public function dashboard(){
        if (Auth::user()->role=='admin') {
            return redirect()->route('admin#categoryList',10);
        }else{
            return redirect()->route('user#homePage');
        }
    }

    //404Page
    public function Page404(){
        return view('Page');
    }

    // login page function
    public function loginPage(){
        return view('auth.login');
    }

    // register page function
    public function registerPage(){
        return view('auth.register');
    }


}
