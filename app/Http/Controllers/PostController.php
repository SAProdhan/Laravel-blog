<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
    public function writePost(){
        return view('post.writepost');
    }
    public function AddCategory(){
        return view('post.add_category');
    }
    public function storeCategory(Request $request){
        
        $validateData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'slug' => 'required|unique:categories|max:25|min:3',
        ]);
        $data = array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->insert($data);
        if($category){
            $notification=array(
                'messege' => 'Successfully Done',
                'alert-type'=>'success'
            );
            return back()->with($notification);
        }else{
            $notification=array(
                'messege' => 'Something went wrong!',
                'alert-type'=>'error'
            );
            return back()->with($notification);
        }
    }

    public function allCategory()
    {
        $category=DB::table('categories')->get();
        return view('post.all_category', compact('category'));
    }

    public function ViewCategory($id)
    {
        $category=DB::table('categories')->where('id', $id)->first();
        return view('post.categoryview')->with('cat', $category);
    }

}
