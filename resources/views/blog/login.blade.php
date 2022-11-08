@section('title')
React App
@stop
@extends('blog.general.master')
@section('content')
<style>  body {
    background-image: url("uploads/img.jpg");
    background-color: #cccccc;
   }
   </style>
        <div class="container">
        
            @if(Session::has('error-message'))
            <div class="alert alert-warning"> {{Session::get('error-message')}} </div>
            @endif
            <div class="row">
                <div class="col-12">
                <h1>Login</h1>
                    <hr>
                    <form action="{{url('login')}}" method="POST">
                        @csrf
                        <!-- Equivalent to... -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />    
                        <label for="email"><b>Email&ensp;&ensp;
                            &ensp;
                        </b></label>
                        <input type="email" placeholder="exam@gmail.com" name="email">
                        <br><br><br><br><br>
                        <label for="password"><b>Password</b></label>
                        <input type="password" placeholder="password" name="password">
                        <hr>
                        <input type="submit" value="Login" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </body>
@stop
