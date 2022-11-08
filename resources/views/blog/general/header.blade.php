<html>
    <head>
        <title>@yield('title') </title>
	     
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header class="mb-2">
            <div class="container">
                @if(Auth::user())
                    {{Auth::user()->name}}
                    {{-- <a href="{{url('')}}"> Trang chủ </a>
                    <a href="{{url('blog/category/create')}}"> Đăng bài mới </a>
                    <a href="{{url('blog/category')}}"> Danh sách nhà hàng </a>
                    <a href="{{url('logout')}}"> Đăng xuất </a> --}}
                    <nav class="navbar navbar-inverse">
                        <div class="container-fluid">
                          <div class="navbar-header">
                            <a class="navbar-brand" >Restaurant</a>
                          </div>
                          <ul class="nav navbar-nav">
                            <li class="active"><a href="{{url('')}}">HomePage</a></li>
                            <li><a href="{{url('blog/category/create')}}">Create</a></li>
                            <li><a href="{{url('blog/category')}}">List</a></li>
                          </ul>
                          <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{url('logout')}}"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
                          </ul>
                        </div>
                      </nav>
                @else
                    {{-- <a href="{{url('register')}}"> Đăng kí </a>
                    <a href="{{url('login')}}"> Đăng nhập </a> --}}
                    <nav class="navbar navbar-inverse">
                        <div class="container-fluid">
                          <div class="navbar-header">
                        
                          </div>
                        
                          <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{url('register')}}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                            <li><a href="{{url('login')}}"><span class="glyphicon glyphicon-user"></span> Sign In</a></li>
                          </ul>
                        </div>
                      </nav>
                @endif
              
            </div>
        </header>
    </body>
        