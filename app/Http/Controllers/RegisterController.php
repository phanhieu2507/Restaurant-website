<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use App\Models\Users;


class RegisterController extends Controller
{
    function register(){
        return view('blog.register');
    }
    function create(Request $reqquest){
        // lay data 
        $email=$reqquest->input('email');
        $name=$reqquest->input('name');
        $password=$reqquest->input('password');
        // kiem tra thong tin
        if(!$email)
        {
            Session::flash('error-message','Vui lòng nhập email');
            return Redirect::to('/register');
        }
        if(!$name)
        {
            Session::flash('error-message','Vui lòng nhập tên');
            return Redirect::to('/register');
        }
        
        if(!$password)
        {
            Session::flash('error-message','Vui lòng nhập mật khẩu');
            return Redirect::to('/register');
        }

        $newCheckUser = new Users;
        $newCheckUser = $newCheckUser->where('email', $email)->first();
        if($newCheckUser)
        {
            Session::flash('error-message','Email '.$email.' đã tồn tại');
            return Redirect::to('/register');
        }


        // chen vao db
        $createNewUser = new Users;
        $createNewUser->name        = $name;
        $createNewUser->email        = $email;
        $createNewUser->password    = bcrypt($password);
        $createNewUser->save();
      //  return Redirect::to('/');

        // tu dang nhap sau khi dang ki
        $userInfo=array(
            'email'=>$email,
            'password'=>$password,
        );
        if(Auth::validate($userInfo))
        {
            if(Auth::attempt($userInfo))
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