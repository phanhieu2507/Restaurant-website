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
            <div class="row">
                <div class="col-12">                    
                <h1>Information</h1>
                <table class="table table-stripe">
                            <tr>
                                <td> Name: </td>
                                <td> {{$category->title}} </td>
                            </tr>
                            <tr>
                                <td> Address: </td>
                                <td> {{$category->address}} </td>
                            </tr>
                            <tr>
                                <td> Description: </td>
                                <td> {!!nl2br($category->content)!!} </td>
                              
                            </tr>
                            <tr>
                                <td> More Infomation </td>
                                <td> <img src="{{('/uploads')}}/{{$category->image}}" width="400"> </td>
                              
                            </tr>
                          
                                                                        
                        </table>
                        <div>
                            <a href="{{url('blog/category')}}"class="btn btn-primary">Back</a>
                        </div>
                    
            </div>
        </div>
    </body>
@stop
 