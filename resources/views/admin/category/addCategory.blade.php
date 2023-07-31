@extends('admin/layout/index')
@section('title')
    Add Category
@endsection
@section('content')
<div class="container pb-5">

    <div class=" d-flex justify-content-between py-4">
        <h3><a class=" text-decoration-none" href="{{route('admin#categoryList',10)}}">Category List</a> / Add Category</h3>
    </div>

    <div class="shadow p-3">

        <form action="{{route('admin#addCategory')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center py-2">Add Category</h1>

            <div class="py-2">
                <label for="name" class="fs-5 py-2">Category Name</label>
                <input type="text" name="name" class=" @error('name') is-invalid @enderror form-control w-50" id="name" placeholder="Enter Category Name.....">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="py-2">
                <label for="image" class="fs-5 py-2">Category Image</label>
                <div class="d-flex flex-column">
                    {{-- <img src="{{asset('image/default.jpg')}}" alt="category_image" style="width: 200px; height:200px;"> --}}
                    <input type="file" name="image" class="@error('image') is-invalid @enderror border border-dark w-50" id="image">
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
                        <option value='1'>Public</option>
                        <option value='0'>Private</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-info" id="create"><i class="fa-solid fa-plus me-2"></i>Create</button>
            </div>
        </form>

    </div>

</div>
@endsection
@section('script')
<script>
    // const fileInput = document.getElementById('image');
    // fileInput.onchange = () => {
    //     const selectedFile = fileInput.files[0];
    //     console.log(selectedFile);
    // }
</script>
@endsection
