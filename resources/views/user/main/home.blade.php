@extends('user.layout.index')
@section('title')
    Home
@endsection
@section('content')
    <div>
        {{-- cover image start --}}
        <div class=" position-relative pb-3">

            <img src="{{asset('image/bestonlineshops2023.jpg')}}" class="w-100" alt="">

            <form method="post" action="{{route('user#productListSearch')}}" class=" container-fluid position-absolute bottom-0 d-flex justify-content-center">
                @csrf
                <div class="">
                    <div class="input-group mb-3  py-2 px-2" >
                        <input type="text" name="name" class="form-control" placeholder="Enter search key ....." >
                        <div class="dropdown  px-1">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Category
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $category)
                                    <li><a class="dropdown-item" href="{{route('user#productListCategory',$category->id)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class=" pt-1">
                    <input type="submit" class="btn btn-primary py-2 " value="Search">
                </div>
            </form>

        </div>
        {{-- cover image end --}}

        {{-- category start --}}
        <div class="row container-fluid py-4">
            <div class="col-10 offset-1 ">

                <div class="d-flex justify-content-between py-2">
                    <h4>What are you looking for ?</h4>
                    <a href="{{route('user#categoryList')}}" class=" text-decoration-none text-info">view more >>></a>
                </div>

                <div class="row py-3">
                    @foreach ($firstCategories as $category)
                        <a href="{{route('user#viewCategory',$category->id)}}" class="col-2 text-decoration-none">
                            <div class="bg-info-subtle px-2 rounded">
                                <div class="d-flex justify-content-center py-2 ">
                                    <img src="{{asset('storage/category_image/'.$category->photo)}}" class="w-50 p-3 shadow rounded-circle bg-warning-subtle" alt="">
                                </div>
                                <h6 class="text-center py-2">{{$category->name}}</h6>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
        {{-- category end --}}

        {{-- product start  --}}

        <div class="row container-fluid py-4">
            <div class="col-10 offset-1 ">

                <div class="d-flex justify-content-between py-2">
                    <h4>Recent Products</h4>
                    <a href="{{route('user#productList')}}" class=" text-decoration-none text-info">view more >>></a>
                </div>

                <div class="row py-3">
                    @foreach ($recentProduct as $product)
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
                </div>

            </div>
        </div>

        {{-- product end  --}}
    </div>
@endsection
