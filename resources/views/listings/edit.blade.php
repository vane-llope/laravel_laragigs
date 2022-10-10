<x-layout> 
    <h3>Edit Form :</h3>
    <form method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-floating mb-3">
          <input type="text" name="title" value="{{$listing->title}}"  class="form-control" id="floatingInput" >
          <label for="floatingInput">Title</label>
          @error('title')
              <p class="text-danger">{{$message}}</p>
          @enderror
        </div>


      <div class="form-floating mb-3">
        <input type="text" name="company" value="{{$listing->company}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Company Name</label>
        @error('company')
            <p class="text-danger">{{$message}}</p>
        @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="location" value="{{$listing->location}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">job location</label>
        @error('location')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="email" name="email" value="{{$listing->email}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Email</label>
        @error('email')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="website" value="{{$listing->website}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Website/Application URL</label>
        @error('website')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="tags" value="{{$listing->tags}}" class="form-control" id="floatingInput" >
        <label for="floatingInput">Tags(Camma Seperated)</label>
        @error('tags')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>
      
      <x-image-uploader :image="$listing->logo"/>

      <div class="form-floating">
        <input type="text" class="form-control" name="description" value="{{$listing->description}}" placeholder="Leave a comment here" id="floatingTextarea" />
        <label for="floatingTextarea">description</label>
        @error('description')
        <p class="text-danger">{{$message}}</p>
    @enderror
      </div>

      
    



      <button type="submit" class="btn btn-danger mt-3 w-100">Update</button>
    </form>





</x-layout>