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
                <h1>Edit</h1>
                   
                    <form action="{{url('blog/category/edit/'.$category->id)}}" method="POST" enctype="multipart/form-data">    
                        @csrf
                        <!-- Equivalent to... -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />   
                        <table class="table table-stripe">
                            <tr>
                                <td> Name: </td>
                                <td>   <input class="form-control" type="text" placeholder="Nhập tên nhà hàng" name="title" value="{{$category->title}}">   </td>
                            </tr>
                            <tr>
                                <td> Address: </td>
                                <td>    <textarea class="form-control" name="address" placeholder="địa chỉ" >{{$category->address}}</textarea> </td>
                            </tr>
                            <tr>
                                <td> Description: </td>
                                <td>   <textarea class="form-control" name="content" placeholder="Mô tả nhà hàng" >{{$category->address}}</textarea>  </td>
                              
                            </tr>
                            <tr>
                                <td> More Information: </td>
                                <td>   
                                    <input type="file" name="file_upload">            
                                    @if($category->image)
                                        <div>
                                        <img src="{{('/uploads')}}/{{$category->image}}" width="400">
                                        </div>
                                    @endif
                                </td>
                            </tr>                                       
                    
                        </table>
                        <input type="submit" value="Update"class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </body>
@stop
 