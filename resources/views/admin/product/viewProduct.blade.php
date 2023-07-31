@extends('admin.layout.index')
@section('title')
    view product
@endsection
@section('content')
<div class="container py-2">

    <h3 class=" py-2"><a href="{{route('admin#productList',10)}}" class=" text-decoration-none">Product List</a> / View Post</h3>

    <div class="py-4 d-flex justify-content-center">
        <div id="carouselExample" class="carousel slide w-50">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('storage/product_image/'.$product->image1)}}" class="d-block w-100" alt="">
              </div>
              <div class="carousel-item">
                <img src="{{asset('storage/product_image/'.$product->image2)}}" class="d-block w-100" alt="">
              </div>
              <div class="carousel-item">
                <img src="{{asset('storage/product_image/'.$product->image3)}}" class="d-block w-100" alt="">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="row">

        <h1 class="py-2 text-capitalize">{{$product->name}}</h1>

        <div class="col-6">

            <h3 class="py-2 text-success">${{$product->price}}</h3>

            <div class="row text-center py-2">
                <div class="col">
                    <h4>Type</h4>
                    @if ($product->type==1)
                        <span class="btn text-danger">Sell</span>
                    @else
                        <span class="btn text-danger">Exchange</span>
                    @endif
                </div>
                <div class="col">
                    <h4>Condition</h4>
                    @if ($product->condition==1)
                        <span class="btn text-success">New</span>
                    @else
                        <span class="btn text-success">Used</span>
                    @endif
                </div>
                <div class="col">
                    <h4>Status</h4>
                    @if ($product->status==0)
                        <span class="btn text-info">Available</span>
                    @else
                        <span class="btn text-info">Sold Out</span>
                    @endif
                </div>
            </div>

            <div class="py-2">
                <h4>Highlighted Information</h4>
                <div class="px-2">
                    <input type="hidden" id='hightLighted_info_text' value="{{$product->hightLighted_info}}">
                    <span class=" text-center text-muted" id="hightLighted_info"></span>
                </div>
            </div>

            <div class="py-2">
                <h4>Description</h4>
                <div class="px-2">
                    <input type="hidden" id='description_text' value="{{$product->description}}">
                    <span class=" text-center text-muted" id="description"></span>
                </div>
            </div>

            <div class="py-2">
                <h4>Owner Information</h4>
                <div class="px-2 text-muted">
                    <div><i class="fa-solid fa-phone me-2"></i>Contact Number</div>
                    <div>+95{{$product->user_phone}}</div>
                </div>
            </div>

            <div class="row px-3 py-4 shadow">
                <div class="col-2">
                    <img src="{{asset('image/default-male-image.png')}}" class="w-100 rounded-circle" alt="default-male-image">
                </div>
                <div class="col-8">
                    <h6>{{$product->user_name}}</h6>
                    <span>{{$product->address}}</span>
                </div>
            </div>

        </div>
        <div class="col-4">
            <div>
                <h4><i class="fa-solid fa-location-dot me-2"></i>Location</h4>
                <span>{{$product->address}}</span>
            </div>
            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3817.4582826778687!2d96.13285577428134!3d16.902671516589628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c194168bb31e03%3A0x26217574c0bf07bf!2sYANGON%20INTERNATIONAL%20AIRPORT!5e0!3m2!1sen!2smm!4v1690699997017!5m2!1sen!2smm" width="400" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        let hightLighted_info=document.getElementById('hightLighted_info');
        let hightLighted_info_text=document.getElementById('hightLighted_info_text').value;
        hightLighted_info.innerHTML=hightLighted_info_text;

        let description=document.getElementById('description');
        let description_text=document.getElementById('description_text').value;
        description.innerHTML=description_text;
    </script>
@endsection
