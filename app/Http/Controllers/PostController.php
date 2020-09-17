<?php
namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
    public function writePost(){
        $category = DB::table('categories')->get();
        return view('post.writepost', compact('category'));
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
            return Redirect()->route('all_category')->with($notification);
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
    public function DeleteCategory($id)
    {
        $category=DB::table('categories')->where('id', $id)->delete();
        if($category){
            $notification=array(
                'messege' => 'Successfully deleted',
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
    public function EditCategory($id)
    {
        $category=DB::table('categories')->where('id', $id)->first();
        return view('post.editcategory', compact('category'));
    }
    public function UpdateCategory(Request $request, $id)
    {
        $category=DB::table('categories')->where('id', $id)->first();
        $validateData = $request->validate([
            'name' => 'required|max:25|min:4',
            'slug' => 'required|max:25|min:3',
        ]);
        $data = array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->where('id', $id)->update($data);
        if($category){
            $notification=array(
                'messege' => 'Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('all_category')->with($notification);
        }else{
            $notification=array(
                'messege' => 'Nothing to update!',
                'alert-type'=>'error'
            );
            return back()->with($notification);
        }
    }


    public function StorePost(Request $request)
    {
        $validateData = $request->validate([
            'title'=> 'required|max:200',
            'details'=> 'required',
            'image'=> 'required | mimes:jpeg,jpg,png,PNG | max:1000',
        ]);
        $data=array();
        $data['title']=$request->title;
        $data['category_id']=$request->category_id;
        $data['details']=$request->details;
        $image=$request->file('image');
        if($image){
            $image_name = Str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path ='public/frontend/postimage';
            $image_url= $upload_path.$image_full_name;
            $success=$image->move($upload_path, $image_full_name);
            $data['image']=$image_url;
            DB::table('posts')->insert($data);
            $notification=array(
                'messege' => 'Successfully Inserted!',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            DB::table('posts')->insert($data);
            $notification=array(
                'messege' => 'Successfully Inserted!',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }


    public function AllPost()
    {
        $post=DB::table('posts')->get();
        return view('post.allPost', compact('post'));
    }

}
