@extends('user.layout.index')
@section('title')
    View Product
@endsection
@section('content')
<div class="row container-fluid py-4">
    <h3 class=" py-2"><a href="{{route('user#homePage')}}" class=" text-decoration-none">Home</a>/ Product List</h3>

    <div class="col-3">

        <div class="py-3">
            <div class="d-flex justify-content-between py-2">
                <h5>Filter By</h5>
                <a href="{{route('user#productList')}}" class=" text-danger text-decoration-none">Clear filter</a>
            </div>

            <form action="{{route('user#productListFilter')}}" method="post">
                @csrf
                <div class="py-2">
                    <h5>Sorting</h5>
                    <div class="d-flex justify-content-around">
                        <div>
                            <input type="radio" checked name="sorting" value="asc" class=" rounded-circle" id="asc">
                            <label for="asc">Asscending</label>
                        </div>
                        <div>
                            <input type="radio" name="sorting" value="desc" class=" rounded-circle" id="desc">
                            <label for="desc">Descending</label>
                        </div>
                    </div>
                </div>

                <div class="py-2">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" value="{{request('name')}}" class=" form-control" placeholder="Enter Product Name">
                </div>

                <div class="py-2">
                    <label for="name">Category</label>
                    <select name="category_id" id="" class=" form-control">
                        <option value="">Choose Product's Category</option>
                        @foreach ($categories as $item)
                        <option value="{{$item->id}}" @if ($item->id==request('category_id')) selected @endif>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="py-2">
                    <label for="name">Item Condition</label>
                    <select name="condition" id="" class=" form-control">
                        <option value="">Choose Product's Condition</option>
                        <option value="1" @if (request('condition')==1) selected @endif>New</option>
                        <option value="2" @if (request('condition')==2) selected @endif>Used</option>
                    </select>
                </div>

                <div class="py-2">
                    <label for="name">Type</label>
                    <select name="type" id="" class=" form-control">
                        <option value="">Choose Product's Type</option>
                        <option value="1" @if (request('type')==1) selected @endif>Sell</option>
                        <option value="2" @if (request('type')==2) selected @endif>exchange</option>
                    </select>
                </div>

                <div class="py-2">
                    <input type="submit" class="btn btn-primary w-100" value="Search">
                </div>
            </form>
        </div>

    </div>
    <div class="col-9 ">

        <div class="row py-3">
            @if (count($products)!=0)
                @foreach ($products as $product)
                    <a href="{{route('user#viewProduct',$product->id)}}" class="col-3 p-2 text-decoration-none">
                        <div class="card">
                            <div class=" position-relative">
                                <img src="{{asset('storage/product_image/'.$product->image1)}}" class="card-img-top" alt="...">
                                <div class=" position-absolute top-0 end-0 pt-2">
                                    @if ($product->status==0)
                                        <span class=" text-success bg-body-tertiary p-2">Avaliable</span>
                                    @else
                                        <span class=" text-danger bg-body-tertiary p-2">Sold Out</span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h6 class="card-title text-capitalize">{{$product->name}}</h6>
                                    @if ($product->condition==1)
                                        <span class=" text-primary bg-body-tertiary">New</span>
                                    @else
                                        <span class=" text-warning bg-body-tertiary">Used</span>
                                    @endif
                                </div>
                                <span class=" text-info">${{$product->price}}</span>
                                <div class="row py-2">
                                    <div class="col-3">
                                        <img src="{{asset('image/default-male-image.png')}}" alt="default-male-image" class="w-100 rounded-circle">
                                    </div>
                                    <h6 class="col pt-2">{{$product->user_name}}</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <h1 class="text-center">There is no product</h1>
            @endif
        </div>

    </div>
</div>
@endsection
