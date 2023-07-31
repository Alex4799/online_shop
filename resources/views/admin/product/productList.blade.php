@extends('admin.layout.index')
@section('title')
    product List
@endsection
@section('content')
<div class="container">

    <div class=" d-flex justify-content-between py-3">
        <h3>Product List</h3>
        <h3>Total - {{$products->total()}}</h3>
        <div>
            <a href="{{route('admin#createProductPage')}}" class="btn btn-info"><i class="fa-solid fa-plus me-2"></i>Add Product</a>
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
                <li><a class="dropdown-item" href="{{route('admin#productList',10)}}">10 rows</a></li>
                <li><a class="dropdown-item" href="{{route('admin#productList',8)}}">8 rows</a></li>
                <li><a class="dropdown-item" href="{{route('admin#productList',6)}}">6 rows</a></li>
                <li><a class="dropdown-item" href="{{route('admin#productList',4)}}">4 rows</a></li>
            </ul>
          </div>
    </div>

    <div>
        <table class="table">
            <thead>
                <tr class=" row text-center table-info">
                    <th class="col-2">No</th>
                    <th class="col-6">Product</th>
                    <th class="col-2">Status</th>
                    <th class="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="row text-center">
                        <td class="col-2">{{$product->id}}</td>
                        <td class="col-6">{{$product->name}}</td>
                        <td class="col-2">

                            <div class="dropdown w-25 px-1">
                                <button class="btn @if ($product->status==0) btn-outline-success @else btn-outline-danger @endif dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  @if ($product->status==0)
                                      Avaliable
                                  @else
                                      Sold out
                                  @endif
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('admin#changeProductStatus',[0,$product->id])}}">Avaliable</a></li>
                                    <li><a class="dropdown-item" href="{{route('admin#changeProductStatus',[1,$product->id])}}">Sold out</a></li>
                                </ul>
                            </div>
                        </td>
                        <td class="col-2">
                            <a href="{{route('admin#viewProduct',$product->id)}}" class="btn btn-info" title="View"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{route('admin#editProduct',$product->id)}}" class="btn btn-success" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('admin#deleteProduct',$product->id)}}" class="btn btn-danger" title="Delete"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{$products->appends(request()->query())->links()}}
        </div>
    </div>

</div>
@endsection
