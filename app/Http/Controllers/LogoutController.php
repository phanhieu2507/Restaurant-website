<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Session;


class LogoutController extends Controller
{
    function index(){
        Auth::logout();
        return Redirect::to('/');
    }
}
?>