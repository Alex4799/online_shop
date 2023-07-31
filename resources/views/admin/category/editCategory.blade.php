@extends('admin/layout/index')
@section('title')
    Edit Category
@endsection
@section('content')
<div class="container pb-5">

    <div class=" d-flex justify-content-between py-4">
        <h3><a class=" text-decoration-none" href="{{route('admin#categoryList',10)}}">Category List</a> / Add Category</h3>
    </div>

    <div class="shadow p-3">

        <form action="{{route('admin#updateCategory')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center py-2">Edit Category</h1>

            <div class="py-2">
                <label for="name" class="fs-5 py-2">Category Name</label>
                <input type="text" name="name" value="{{$category->name}}" class=" @error('name') is-invalid @enderror form-control w-50" id="name" placeholder="Enter Category Name.....">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="py-2">
                <label for="image" class="fs-5 py-2">Category Image</label>
                <div class="d-flex flex-column">
                    <img src="{{asset('storage/category_image/'.$category->photo)}}" alt="category_image" style="width: 300px; height:200px;">
                    <input type="file" name="image" class="@error('image') is-invalid @enderror border border-dark w-50 mt-2" id="image">
                    @error('image')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="py-2">
                <label for="name" class="fs-5 py-2">Status</label>
                <div class="">
                    <select name="status" id="" class="@error('status') is-invalid @enderror form-select w-50">
                        <option value=''>Choose status</option>
                        <option value='1' @if ($category->status==1) selected @endif>Public</option>
                        <option value='0' @if ($category->status==0) selected @endif>Private</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <input type="hidden" name="id" value="{{$category->id}}">

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-info" id="create"><i class="fa-solid fa-plus me-2"></i>Create</button>
            </div>
        </form>

    </div>

</div>
@endsection
