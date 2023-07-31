<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alex |@yield('title')</title>

    {{-- bootstrap css cdn link  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    {{-- font-awesome cdn link  --}}
    <script src="https://kit.fontawesome.com/10de2103ef.js" crossorigin="anonymous"></script>
    @yield('style')
</head>
<body>
    <div class="px-1">
        <div class="row container-fluid">

            <div class="col-3 shadow px-2 py-3 position-sticky top-0" style="height: 100vh" id="first_child">

                <div class="row pb-5 px-1">
                    <div class="col-4">
                        <img src="{{asset('image/lucifer.jpg')}}" alt="lucifer" class=" w-100 rounded-circle shadow">
                    </div>
                    <div class="col-8 lh-1">
                        <h2>A l e x</h2>
                        <span class="font-monospace">C o m p a n y</span>
                    </div>
                </div>

                <div class="menus">

                    <div class="d-flex justify-content-between py-3 px-5 rounded">
                        <a href="{{route('admin#categoryList',10)}}" class="fs-5 text-dark text-decoration-none"><i class="fa-solid fa-list me-5"></i>Category</a>
                    </div>

                    <div class=" d-flex justify-content-between py-3 px-5 rounded">
                        <a href="{{route('admin#productList',10)}}" class="fs-5 text-dark text-decoration-none"><i class="fa-solid fa-table-cells me-5"></i>Products</a>
                    </div>

                </div>


            </div>

            <div class="col-9" id="second_child">
                <div class=" position-sticky bg-white z-1 top-0 py-3 px-2 w-100 d-flex justify-content-between">
                    <div class="fs-3 ">
                        <a onclick="menusToggle()" class="text-dark"><i class="fa-solid fa-bars"></i></a>
                    </div>
                    <div>
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              {{Auth::user()->name}}
                            </a>

                            <ul class="dropdown-menu">
                              <li class="py-1"><a class="w-100 btn btn-outline-info" href="#">Profile</a></li>
                              <li class="py-1">
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <input class="w-100 " type="submit" value="logout">
                                </form>
                              </li>
                            </ul>
                          </div>
                    </div>
                </div>
                <div>
                    @yield('content')
                </div>
            </div>

        </div>
    </div>

</body>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@yield('script')
{{-- bootstrap js cdn link  --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<script>
    let firstMenusStatus=true;
    let firstChild=document.getElementById('first_child');
    let secondChild=document.getElementById('second_child');

    function menusToggle(){
        if(firstMenusStatus){
            firstChild.classList.add('d-none');
            secondChild.classList.remove('col-9');
            firstMenusStatus=false;
        }else{
            firstChild.classList.remove('d-none');
            secondChild.classList.add('col-9');
            firstMenusStatus=true;
        }
    }
</script>
</html>
