<x-layout>
    <div class="d-flex">
    <a class="nav-link text-dark" href="/">Back</a>
    @if($listing->user_id == auth()->id() ) 
    <a class="nav-link text-dark" href="/listings/{{$listing->id}}/edit">Edit</a>
    @endif
    @if($listing->user_id == auth()->id() ) 
      <form method="POST" action="/listings/{{$listing->id}}">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn">Delete</button>
   </form>
   @endif
    </div>
       <x-card class="alert-light">
       <div class="text-center">
        <img  class="w-50 mb-3"
        src="{{($listing->logo) ? asset('images/'. $listing->logo) : asset('/images/clipart3509710.png')}}" alt="" />
    
       <h2 >{{$listing['title']}}</h2>
           <p>{{$listing['company']}}</p>
           <p>{{$listing['email']}}</p>
           <p>{{$listing['website']}}</p>
           <p>{{$listing['location']}}</p>
           <p>{{$listing['description']}}</p>
           <x-listing-tags :tagsCsv="$listing['tags']"/>
          </div>
       </x-card>

    </x-layout>


