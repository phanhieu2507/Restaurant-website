<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use Validator;
use App\Models\BlogCategory;
// dung de xoa file
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



class CategoryController extends Controller
{
    private $__uploads='uploads';
    function index(Request $reqquest){
        $blogCategory = new BlogCategory;
        $blogCategory = $blogCategory->orderBy('title','ASC')->paginate(3)->appends($reqquest->all());
        return view('blog.category.index',['blogCategory'=>$blogCategory]);
    }
    function create(){
        return view('blog.category.create');
    }
    function store(Request $reqquest){
        // lay data 
        $title=$reqquest->input('title'); // ten nha hang
        $address=$reqquest->input('address');
        $content=$reqquest->input('content');


    // check các ô đã được điền hay chưa
        if(!$title)
        {
            Session::flash('error-message','Tên nhà hàng không được để trống');
            return Redirect::to('/blog/category/create');
        }
        if(!$address)
        {
            Session::flash('error-message','Địa chỉ không được để trống');
            return Redirect::to('/blog/category/create');
        }
        if(!$content)
        {
            Session::flash('error-message','Nội dung không được để trống');
            return Redirect::to('/blog/category/create');
        }
        // kiểm tra file ảnh
        $image='';

        if($reqquest->has('file_upload')){
            $rules = array('file_upload' => 'mimes:jpg,jpeg,png,bmp,gif,svg |max:40000');
            $file = $reqquest->file('file_upload');
            $file = array('file_upload' => $file);
            $validator = Validator::make($file, $rules);
            if($validator->fails())
            {     
                Session::flash('error-message','Không thể upload file ảnh');
                return Redirect::to('/blog/category/create');
                //exit('Không thể upload ảnh')
            }
            else{
                $file = $reqquest->file_upload;
                $ext = $reqquest->file_upload->extension();
                $file_name = time().'-'.'product.'.$ext;
                $file->move(public_path('uploads'),$file_name);

            }
            $reqquest->merge(['image' => $file_name]);


        }

        // chen vao db
        $createCategory = new BlogCategory;
        $createCategory->title = $title;
        $createCategory->address = $address;
        $createCategory->content = $content;
        $createCategory->image = $file_name;
        $createCategory->save();
        return Redirect::to('/blog/category/detail/'.$createCategory->id);

    }

    function detail($id){
        $category = new BlogCategory;
        $category = $category->find($id);
        return view('blog.category.detail',['category'=>$category]);

    }

    function delete($id){
        $category = new BlogCategory;
        $category = $category->find($id);
        // xoa hinh
        if($category->image){  
            File::delete('uploads/'.$category->image);
        }
        $category->delete();
        return Redirect::to('/blog/category/');
    }
    function edit($id){
        $category = new BlogCategory;
        $category = $category->find($id);
        return view('blog.category.edit',['category'=>$category]);
    }

    function update($id, Request $reqquest){
        // lay data 
        $title=$reqquest->input('title'); // ten nha hang
        $address=$reqquest->input('address');
        $content=$reqquest->input('content');


    // check các ô đã được điền hay chưa
        if(!$title)
        {
            Session::flash('error-message','Tên nhà hàng không được để trống');
            return Redirect::to('/blog/category/edit/'.$createCategory->id);
        }
        if(!$address)
        {
            Session::flash('error-message','Địa chỉ không được để trống');
            return Redirect::to('/blog/category/edit/'.$createCategory->id);
        }
        if(!$content)
        {
            Session::flash('error-message','Nội dung không được để trống');
            return Redirect::to('/blog/category/edit/'.$createCategory->id);
        }
        // kiểm tra file ảnh

        if($reqquest->has('file_upload')){
            $rules = array('file_upload' => 'mimes:jpg,jpeg,png,bmp,gif,svg |max:40000');
            $file = $reqquest->file('file_upload');
            $file = array('file_upload' => $file);
            $validator = Validator::make($file, $rules);
            if($validator->fails())
            {     
                Session::flash('error-message','Không thể upload file ảnh');
                return Redirect::to('/blog/category/edit/'.$createCategory->id);
                //exit('Không thể upload ảnh')
            }
            else{
                $file = $reqquest->file_upload;
                $ext = $reqquest->file_upload->extension();
                $file_name = time().'-'.'product.'.$ext;
                $file->move(public_path('uploads'),$file_name);

            }
            $reqquest->merge(['image' => $file_name]);


        }

        // chen vao db
        $createCategory = new BlogCategory;
        $createCategory = $createCategory->find($id);
        $createCategory->title = $title;
        $createCategory->address = $address;
        $createCategory->content = $content;
        if(isset($file_name)){
            $createCategory->image = $file_name;
        }  
        $createCategory->save();
        return Redirect::to('/blog/category/detail/'.$createCategory->id);

    }
}
?>