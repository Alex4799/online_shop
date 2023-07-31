@extends('user.layout.index')
@section('title')
    Category List
@endsection
@section('content')
<div class="row container-fluid py-4">
    <div class="col-10 offset-1 ">

        <h3 class=" py-2"><a href="{{route('user#homePage')}}" class=" text-decoration-none">Home</a>/ {{$category->name}}</h3>

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
                <h1 class=" text-center">There is no product here</h1>
            @endif
        </div>

    </div>
</div>
@endsection
