<x-layout>
    <form method="POST" action="/listings" enctype="multipart/form-data">
        @csrf

        <div class="form-floating mb-3">
          <input type="text" name="title" value="{{old('title')}}" class="form-control" id="floatingInput" >
          <label for="floatingInput">Title</label>
          @error('title')
              <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        
      <div class="form-floating mb-3">
        <input type="text" name="company" value="{{old('company')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Company Name</label>
        @error('company')
            <p class="text-danger">{{$message}}</p>
        @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="location" value="{{old('location')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">job location</label>
        @error('location')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Email</label>
        @error('email')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="website" value="{{old('website')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Website/Application URL</label>
        @error('website')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="tags" value="{{old('tags')}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Tags(Camma Seperated)</label>
        @error('tags')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <x-image-uploader :image="null"/>

      <div class="form-floating">
        <textarea class="form-control" name="description" value="{{old('description')}}" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
        <label for="floatingTextarea">description</label>
        @error('description')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <button type="submit" class="btn btn-primary mt-3 w-100">Submit The Form</button>
    </form>
</x-layout>