@extends('user.layout.index')
@section('title')
    Category List
@endsection
@section('content')
    <div class="row container-fluid">
        <div class="col-10 offset-1">
            <h3 class=" py-2"><a href="{{route('user#homePage')}}" class=" text-decoration-none">Home</a>/ Category List</h3>

            <div class="row py-3">
                @foreach ($categories as $category)
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
@endsection
