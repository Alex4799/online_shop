<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //public function

    //admin

    // product List page
    public function productList($id){
        $products=Product::paginate($id);
        return view('admin.product.productlist',compact('products','id'));
    }

    //create product page
    public function createProductPage(){
        $category=Category::get();
        return view('admin.product.createProduct',compact('category'));
    }

    // create Product
    public function createProduct(Request $req){
        $this->validationCheck($req);
        $data=$this->changeDataType($req);
        for ($i=1; $i <4 ; $i++) {
            $imageName=uniqid().$req->file('image'.$i)->getClientOriginalName();
            $req->file('image'.$i)->storeAs('public/product_image',$imageName);
            $data['image'.$i]=$imageName;
        }
        Product::create($data);
        return redirect()->route('admin#productList',10)->with(['createSucc'=>'Product Create Successful.']);

    }

    //view Product
    public function viewProduct($id){
        $product=Product::select('products.*','users.name as user_name','users.phone as user_phone')
        ->where('products.id',$id)
        ->leftJoin('users','products.user_id','users.id')
        ->first();
        return view('admin.product.viewProduct',compact('product'));
    }

    // change Status
    public function changeProductStatus($status,$id){
        Product::where('id',$id)->update(['status'=>$status]);
        return redirect()->route('admin#productList',10)->with(['updateSucc'=>'Product Update Successful.']);
    }

    //edit product
    public function editProduct($id){
        $product=Product::where('id',$id)->first();
        $category=Category::get();
        return view('admin.product.editproduct',compact('product','category'));
    }

    // update Product
    public function updateProduct(Request $req){
        $this->validationCheck($req);
        $data=$this->changeDataType($req);
        for ($i=1; $i < 4; $i++) {
            if ($req->hasFile('image'.$i)) {
                $image='image'.$i;
                $dbImage=Product::where('id',$req->id)->first()->$image;
                Storage::delete('public/'.$dbImage);
                $imageName=uniqid().$req->file('image'.$i)->getClientOriginalName();
                $req->file('image'.$i)->storeAs('public/product_image/',$imageName);
                $data['image'.$i]=$imageName;
            };
        };
        Product::where('id',$req->id)->update($data);
        return redirect()->route('admin#productList',10)->with(['updateSucc'=>'Product Update Successful.']);
    }

    // delete Product
    public function deleteProduct($id){
        for ($i=1; $i < 4; $i++) {
             $image='image'.$i;
             $dbImage=Product::where('id',$id)->first()->$image;
             if ($dbImage!=null) {
                Storage::delete('public/'.$dbImage);
             }
        };
        Product::where('id',$id)->delete();
        return redirect()->route('admin#productList',10)->with(['deleteSucc'=>'Product Delete Successful.']);

    }

    // user

    // product List
    public function productList_user(){
        $categories=Category::get();
        $products=Product::select('products.*','users.name as user_name')
        ->leftJoin('users','products.user_id','users.id')
        ->orderBy('created_at','asc')->get();
        return view('user.main.productList',compact('products','categories'));
    }

    //product List Filter
    public function productListFilter_user(Request $req){
        $categories=Category::get();
        $products=Product::select('products.*','users.name as user_name')
        ->leftJoin('users','products.user_id','users.id')
        ->when(request('sorting'),function($search_key){
            $search_key->orderBy('created_at',request('sorting'));
        })
        ->when(request('name'),function($search_key){
            $search_key->where('products.name','like','%'.request('name').'%');
        })
        ->when(request('category_id'),function($search_key){
            $search_key->where('products.category_id',request('category_id'));
        })
        ->when(request('condition'),function($search_key){
            $search_key->where('products.condition',request('condition'));
        })
        ->when(request('type'),function($search_key){
            $search_key->where('products.type',request('type'));
        })
        ->get();

        return view('user.main.productList',compact('products','categories'));
    }

    // product List Search
    public function productListSearch_user(Request $req){
        $categories=Category::get();
        $products=Product::select('products.*','users.name as user_name')
        ->leftJoin('users','products.user_id','users.id')
        ->where('products.name','like','%'.request('name').'%')
        ->orderBy('created_at','asc')->get();
        return view('user.main.productList',compact('products','categories'));
    }

    // product List Category
    public function productListCategory_user($id){
        $categories=Category::get();
        $products=Product::select('products.*','users.name as user_name')
        ->leftJoin('users','products.user_id','users.id')
        ->where('products.category_id',$id)
        ->orderBy('created_at','asc')->get();
        return view('user.main.productList',compact('products','categories'));
    }

    // view Product
    public function viewProduct_user($id){
        $product=Product::select('products.*','users.name as user_name','users.phone as user_phone','categories.name as category_name')
        ->where('products.id',$id)
        ->leftJoin('users','products.user_id','users.id')
        ->leftJoin('categories','products.category_id','categories.id')
        ->first();
        return view('user.main.viewProduct',compact('product'));
    }

    // private function

    //validation check
    private function validationCheck($req){
        Validator::make($req->all(),[
            'name'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'user_id'=>'required',
            'hightLighted_info'=>'required',
            'description'=>'required',
            'address'=>'required',
            'type'=>'required',
            'condition'=>'required',
        ])->validate();
    }

    // change data type
    private function changeDataType($req){
        return [
            'name'=>$req->name,
            'price'=>$req->price,
            'category_id'=>$req->category_id,
            'user_id'=>$req->user_id,
            'hightLighted_info'=>$req->hightLighted_info,
            'description'=>$req->description,
            'address'=>$req->address,
            'type'=>$req->type,
            'condition'=>$req->condition,
        ];
    }

}
