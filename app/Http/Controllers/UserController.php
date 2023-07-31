<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //home Page
    public function homePage(){
        $categories=Category::get();
        $firstCategories=Category::paginate(6);
        $recentProduct=Product::select('products.*','users.name as user_name')
        ->leftJoin('users','products.user_id','users.id')
        ->orderBy('created_at','desc')->paginate(8);
        return view('user.main.home',compact('categories','firstCategories','recentProduct'));
    }
}
