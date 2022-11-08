@section('title')
React App
@stop
@extends('blog.general.master')
@section('content')
<style> .pagination svg{width: 20px;} </style>
<style>  body {
    background-image: url("uploads/img.jpg");
    background-color: #cccccc;
   }
   </style>
        <div class="container">
            <div class="row">
                <h1>List</h1>
                <br>
                <br>
                <br>
                <br>
                <table class="table table-stripe">
                    <tr>
                        <td> <b>NAME</b> </td>
                        <td> <b> ACTION </b> </td>
                    </tr>
                    @foreach($blogCategory as $key=>$value)
                    <tr>
                        
                        <td>{{$value->title}}</td>
                        <td> 
                            <button> <a  href="{{url('blog/category/detail')}}/{{$value->id}}"class="btn btn-success"> View </a> </button>                          
                            <button> <a href="{{url('blog/category/edit')}}/{{$value->id}}"class="btn btn-warning"> Edit </a> </button>
                            <button> <a href="{{url('blog/category/delete')}}/{{$value->id}}"class="btn btn-danger">Delete</a> </button>  
                        </td>
                        
                    </tr>
                    @endforeach
                </table>
                
                <div class="col-12">
                    <div class="pagination">{{$blogCategory->render()}} </div>         
                </div> 
            </div>
        </div>
    </body>
@stop
 