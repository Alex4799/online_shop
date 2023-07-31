<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>

    {{-- bootstrap css cdn link  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
    <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100vh">
        <h1 class=" fs-1 text-danger">You Don't Have Permission For This Page</h1>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <input type="submit" value="Log out" class="btn btn-danger">
        </form>
    </div>
</body>
</html>
