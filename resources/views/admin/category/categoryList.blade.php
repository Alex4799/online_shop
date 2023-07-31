@extends('admin/layout/index')
@section('title')
    Category
@endsection
@section('content')
    <div class="container">

        <div class=" d-flex justify-content-between py-3">
            <h3>Category List</h3>
            <h3>Total - {{$categories->total()}}</h3>
            <div>
                <a href="{{route('admin#addCategoryPage')}}" class="btn btn-info"><i class="fa-solid fa-plus me-2"></i>Add Category</a>
            </div>
        </div>

        @if (session('createSucc'))
        <div class="alert alert-success alert-dismissible fade show col-4 offset-8" role="alert">
            {{session('createSucc')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('updateSucc'))
        <div class="alert alert-success alert-dismissible fade show col-4 offset-8" role="alert">
            {{session('updateSucc')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('deleteSucc'))
        <div class="alert alert-danger alert-dismissible fade show col-4 offset-8" role="alert">
            {{session('deleteSucc')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class=" d-flex justify-content-start py-3">
            <span class="pt-3 pe-2">Show : </span>
            <div class="dropdown w-25 py-2 px-1">
                <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{$id}} rows
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('admin#categoryList',10)}}">10 rows</a></li>
                    <li><a class="dropdown-item" href="{{route('admin#categoryList',8)}}">8 rows</a></li>
                    <li><a class="dropdown-item" href="{{route('admin#categoryList',6)}}">6 rows</a></li>
                    <li><a class="dropdown-item" href="{{route('admin#categoryList',4)}}">4 rows</a></li>
                </ul>
              </div>
        </div>

        <div>
            <table class="table">
                <thead>
                    <tr class=" row text-center table-info">
                        <th class="col-2">No</th>
                        <th class="col-5">Category</th>
                        <th class="col-3">Public</th>
                        <th class="col-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="row text-center">
                            <td class="col-2">{{$category->id}}</td>
                            <td class="col-5">{{$category->name}}</td>
                            <td class="col-3">

                                <div class="dropdown w-25 py-2 px-1">
                                    <button class="btn @if ($category->status==1) btn-outline-success @else btn-outline-warning @endif dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      @if ($category->status==1)
                                          Public
                                      @else
                                          Private
                                      @endif
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{route('admin#changeStatus',[1,$category->id])}}">Public</a></li>
                                        <li><a class="dropdown-item" href="{{route('admin#changeStatus',[0,$category->id])}}">Private</a></li>
                                    </ul>
                                  </div>
                            </td>
                            <td class="col-2">
                                <a href="{{route('admin#editCategory',$category->id)}}" class="btn btn-success" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{route('admin#deleteCategory',$category->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{$categories->appends(request()->query())->links()}}
            </div>
        </div>

    </div>
@endsection
