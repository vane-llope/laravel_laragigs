<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
{{--Alpine--}}
<script src="//unpkg.com/alpinejs" defer></script>  
<title>Laragigs</title>
</head>
<body>
    {{--View Output--}}
    <div class="container mt-1">
        <div class="d-flex justify-content-between">
          <a href="/" class="text-dark nav-link"><h1> Lara<span class="text-danger">Gigs</span> </h1></a>  
          <div class="d-flex mt-4">
             @auth
             <a class="text-dark nav-link fw-bold">Welcome {{auth()->user()->name}}</a>
            <a href="/listings/manage" class="text-dark nav-link">Mange Listing</a>  
            <a class="text-dark nav-link">
              <form action="/users/logout" method="POST" >
                @csrf
                <button class="btn btn-danger fw-bold" type="submit">Logout</button>
                </form>
            </a>  
            @else
            <a href="/users/register" class="text-dark nav-link">Register</a>  
            <a href="/users/login" class="text-dark nav-link">Login</a>  
             @endauth
          </div>
   </div>
   <x-flash-message/>
    {{$slot}}
    </div>

    
</body>
</html>