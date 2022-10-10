<x-layout>
    <a class="nav-link text-dark" href="/users/register">Don't Have An Account?<span class="text-danger">Let's Register</span>  </a>
    <form class="mt-3" method="POST" action="/users/authenticate" enctype="multipart/form-data">
        @csrf

      <div class="form-floating mb-3">
        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Email</label>
        @error('email')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="password" name="password" value="{{old('password')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Password</label>
        @error('password')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <button type="submit" class="btn btn-primary mt-3 w-100">Sign In</button>
    </form>
</x-layout>