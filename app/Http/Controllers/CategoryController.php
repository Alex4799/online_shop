<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // public function

    //admin
    //category list
    public function categoryList($id){
        $categories=Category::paginate($id);
        return view('admin.category.categoryList',compact('categories','id'));
    }

    // add category page
    public function addCategoryPage(){
        return view('admin.category.addCategory');
    }

    // add category function
    public function addCategory(Request $req){
        $this->validationCheck($req);
        $data=[
            'name'=>$req->name,
            'status'=>$req->status,
        ];
        if(isset($req->image)){
            $img_name=uniqid().$req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/category_image',$img_name);
            $data['photo']=$img_name;
        }
        Category::create($data);
        return redirect()->route('admin#categoryList',10)->with(['createSucc'=>'Category Create Successful.']);
    }

    // change category status
    public function changeStatus($status,$id){
        Category::where('id',$id)->update(['status'=>$status]);
        return redirect()->route('admin#categoryList',10)->with(['updateSucc'=>'Category Update Successful.']);
    }

    // edit category
    public function editCategory($id){
        $category=Category::where('id',$id)->first();
        return view('admin.category.editCategory',compact('category'));
    }

    public function updateCategory(Request $req){
        $this->validationCheck($req);
        $data=[
            'name'=>$req->name,
            'status'=>$req->status,
        ];
        if(isset($req->image)){
            $db_image=Category::where('id',$req->id)->first()->photo;
            if($db_image!=null){
                Storage::delete('public/category_image/'.$db_image);
            }
            $img_name=uniqid().$req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/category_image',$img_name);
            $data['photo']=$img_name;
        }
        Category::where('id',$req->id)->update($data);
        return redirect()->route('admin#categoryList',10)->with(['updateSucc'=>'Category Update Successful.']);

    }

    // delete Category
    public function deleteCategory($id){
        $db_image=Category::where('id',$id)->first()->photo;
        if($db_image==null){
            Storage::delete('public/category_image/'.$db_image);
        }
        Category::where('id',$id)->delete();
        return redirect()->route('admin#categoryList',10)->with(['deleteSucc'=>'Category Delete Successful.']);

    }

    //user

    // category list
    public function categoryList_user(){
        $categories=Category::get();
        return view('user.main.categoryList',compact('categories'));
    }

    // view category
    public function viewCategory_user($id){
        $category=Category::where('id',$id)->first();
        $products=Product::where('category_id',$id)->get();
        return view('user.main.viewCategory',compact('category','products'));
    }

    // private function

    // validation check
    private function validationCheck($req){
        Validator::make($req->all(),[
            'name'=>'required',
            'status'=>'required',
        ])->validate();
    }

}
