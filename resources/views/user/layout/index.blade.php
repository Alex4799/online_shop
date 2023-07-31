<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alex | @yield('title')</title>

    {{-- bootstrap css cdn link  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    {{-- font-awesome cdn link  --}}
    <script src="https://kit.fontawesome.com/10de2103ef.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="">

        <div class="position-sticky bg-white z-3 top-0 py-2 px-2 shadow">
            <div class="  row">

                <div class="col-3">
                    <div class="row px-1">
                        <div class="col-4">
                            <img src="{{asset('image/lucifer.jpg')}}" alt="lucifer" class=" w-100 rounded-circle shadow">
                        </div>
                        <div class="col-8 lh-1">
                            <h2>A l e x</h2>
                            <span class="font-monospace">C o m p a n y</span>
                        </div>
                    </div>
                </div>

                <div class="col-7 d-flex">

                    <div class="d-flex justify-content-between py-3 px-5 rounded">
                        <a href="{{route('user#homePage')}}" class="fs-5 text-dark text-decoration-none">Home</a>
                    </div>

                    <div class="d-flex justify-content-between py-3 px-5 rounded">
                        <a href="{{route('user#categoryList')}}" class="fs-5 text-dark text-decoration-none">Category</a>
                    </div>

                    <div class="d-flex justify-content-between py-3 px-5 rounded">
                        <a href="{{route('user#productList')}}" class="fs-5 text-dark text-decoration-none">Product</a>
                    </div>

                </div>

                <div class="col-2 pt-3">
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
        </div>

        <div>
            @yield('content')
        </div>

    </div>
    @yield('script')
    {{-- bootstrap js cdn link  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>
