<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use App\Models\Users;


class LoginController extends Controller
{
    function index(){
        if(Auth::user())
        {
            return Redirect::to('/');
        }
        return view('blog.login');
    }
    function login(Request $reqquest){
        $email      =   $reqquest->input('email');
        $password   =   $reqquest->input('password');
        $userInfo=array(
            'email'=>$email,
            'password'=>$password,
        );
        if(Auth::validate($userInfo))
        {
            if(Auth::attempt($userInfo, true))
            {
                return Redirect::to('/');
            }
            else
            {
                Session::flash('error-message','Lỗi đăng nhập');
                return Redirect::to('/login');
            }
        }
        else{
            Session::flash('error-message','Lỗi đăng nhập');
            return Redirect::to('/login');
        }
        
    }
}
?>