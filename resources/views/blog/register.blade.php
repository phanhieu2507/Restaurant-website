@section('title')
React App
@stop
@extends('blog.general.master')
@section('content')
        <div class="container">
            
            @if(Session::has('error-message'))
            <div class="alert alert-warning"> {{Session::get('error-message')}} </div>
            @endif
            <div class="row">
                <div class="col-12">
                <h1>Đăng kí</h1>
                    <hr>
                    <form action="{{url('register')}}" method="POST">
                        @csrf
                        <!-- Equivalent to... -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />             
                        <label for="username"><b>Tên người dùng</b></label>
                        <input type="text" placeholder="username" name="name">
                        <label for="email"><b>Nhập email</b></label>
                        <input type="email" placeholder="exam@gmail.com" name="email">
                        <label for="password"><b>Nhập mật khẩu</b></label>
                        <input type="password" placeholder="password" name="password">
                        <hr>
                        <input type="submit" value="Đăng kí">
                    </form>
                </div>
            </div>
        </div>
    </body>
@stop
 