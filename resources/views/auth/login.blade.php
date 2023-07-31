<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- bootstrap css cdn link  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    {{-- font-awesome cdn link  --}}
    <script src="https://kit.fontawesome.com/10de2103ef.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container my-5">
        <div class="col-lg-8 offset-lg-2 shadow py-2 px-3 rounded">

            <div class="row py-3 px-1">
                <div class="col-2 offset-4">
                    <img src="{{asset('image/lucifer.jpg')}}" alt="lucifer" class=" w-100 rounded-circle shadow">
                </div>
                <div class="col-5 lh-1 pt-3">
                    <h2>A l e x</h2>
                    <span class="font-monospace">C o m p a n y</span>
                </div>
            </div>

            <h1 class="text-center">Log in to your account</h1>
            <span class="text-center d-block">Welcome Back From Alex Company</span>
            <div class=" container py-3">
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class=" py-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror form-control" placeholder="example@gmail.com">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class=" py-2 position-relative">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror password form-control" placeholder="********">
                        <a onclick="changeInputType()" class="open position-absolute top-50 end-0 pe-3 d-none"><i class="fa-solid fa-eye text-dark"></i></a>
                        <a onclick="changeInputType()" class="close position-absolute top-50 end-0 pe-3"><i class="fa-solid fa-eye-slash text-dark"></i></a>
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="py-2">
                        <input class=" w-100 btn btn-primary" type="submit" value="Sign in">
                    </div>

                    <div>
                        <a href="{{route('registerPage')}}"><span>you don't have an account?</span></a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</body>

{{-- bootstrap js cdn link  --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

{{-- jquery cdn link  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function changeInputType() {
        let input = document.getElementsByClassName('password')[0];
        let open = document.getElementsByClassName('open')[0];
        let close = document.getElementsByClassName('close')[0];

        if (input.type === "password") {
            input.type = "text";
            open.classList.remove('d-none');
            close.classList.add('d-none');

        } else {
            input.type = "password";
            open.classList.add('d-none');
            close.classList.remove('d-none');
        }
    }
</script>
</html>
