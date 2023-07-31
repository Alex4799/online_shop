@extends('admin.layout.index')
@section('title')
    edit product
@endsection
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-12">
                <h3><a href="{{route('admin#productList',10)}}">Product List</a>/ <a href="{{route('admin#viewProduct',$product->id)}}" class=" text-capitalize">{{$product->name}}</a> / Edit Post</h3>
                <div class="">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="card-title">
                                <h1 class="text-center title-2">Edit Product</h1>
                            </div>
                            <hr>
                                <form action="{{route('admin#updateProduct')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                    <div class="col-lg-4 offset-lg-1">
                                        <div class="my-2">
                                            <div class="image">
                                                <img src="{{asset('storage/product_image/'.$product->image1)}}" class="w-100 shadow">
                                            </div>
                                            <input type="file" name="image1" id="image1" class="@error('image1') is-invalid @enderror form-control">
                                            @error('image1')
                                            <small class=" text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="my-2">
                                            <div class="image">
                                                <img src="{{asset('storage/product_image/'.$product->image2)}}" class="w-100 shadow">
                                            </div>
                                            <input type="file" name="image2" id="image2" class="@error('image2') is-invalid @enderror form-control">
                                            @error('image2')
                                            <small class=" text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="my-2">
                                            <div class="image">
                                                <img src="{{asset('storage/product_image/'.$product->image3)}}" class="w-100 shadow">
                                            </div>
                                            <input type="file" name="image3" id="image3" class="@error('image3') is-invalid @enderror form-control">
                                            @error('image3')
                                            <small class=" text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-lg-6 offset-lg-1">

                                        <div class=" my-3">
                                            <label for="" class=" control-label">Name</label>
                                            <input value="{{$product->name}}" placeholder="Enter Product's Name" type="text" name="name" class=" form-control @error('name') is-invalid @enderror" id="">

                                            @error('name')
                                            <small class=" text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class=" my-3">
                                            <label for="" class=" control-label">Category</label>
                                            <select name="category_id" id="" class=" form-control @error('category_id') is-invalid @enderror">
                                                <option value="">Choose Product's Category</option>
                                                @foreach ($category as $item)
                                                <option value="{{$item->id}}" @if ($product->category_id==$item->id) selected @endif>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <small class=" text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class=" my-3">
                                            <label for="" class=" control-label">Hightlighted Info</label>
                                            <textarea placeholder="Enter Product's Hightlighted Info" name="hightLighted_info" class="form-control @error('hightLighted_info') is-invalid @enderror" cols="30" rows="4">{{$product->hightLighted_info}}</textarea>
                                            @error('hightLighted_info')
                                            <small class=" text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class=" my-3">
                                            <label for="" class=" control-label">Description</label>
                                            <textarea placeholder="Enter Product's Description" name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{$product->description}}</textarea>
                                            @error('description')
                                            <small class=" text-danger">{{$message}}</small>
                                            @enderror
                                        </div>


                                        <div class=" my-3">
                                            <label for="" class=" control-label">Price (MMK)</label>
                                            <input placeholder="Enter Product's Price" value="{{$product->price}}" type="number" name="price" class=" form-control @error('price') is-invalid @enderror" id="">
                                            @error('price')
                                            <small class=" text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class=" my-3">
                                            <label for="" class=" control-label">Address</label>
                                            <textarea placeholder="Enter Product's Address" name="address" class="form-control @error('address') is-invalid @enderror" cols="30" rows="4">{{$product->address}}</textarea>
                                            @error('address')
                                            <small class=" text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                        <div class=" my-3">
                                            <label for="" class=" control-label">Type</label>
                                            <select name="type" id="" class=" form-control @error('type') is-invalid @enderror">
                                                <option value="">Choose Product's Type</option>
                                                <option value="1" @if ($product->type==1) selected @endif>Sell</option>
                                                <option value="2" @if ($product->type==2) selected @endif>Exchange</option>
                                            </select>
                                            @error('type')
                                            <small class=" text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class=" my-3">
                                            <label for="" class=" control-label">Condition</label>
                                            <select name="condition" id="" class=" form-control @error('condition') is-invalid @enderror">
                                                <option value="">Choose Product's Condition</option>
                                                <option value="1" @if ($product->condition==1) selected @endif>New</option>
                                                <option value="2" @if ($product->condition==2) selected @endif>Used</option>
                                            </select>
                                            @error('condition')
                                            <small class=" text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <input type="hidden" value="{{$product->id}}" name="id">

                                        <div class="">
                                            <button type="submit" class=" btn btn-dark"><i class="fa-solid fa-pen-to-square"></i>Update Product</button>
                                        </div>

                                    </div>
                                    </div>
                                </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
