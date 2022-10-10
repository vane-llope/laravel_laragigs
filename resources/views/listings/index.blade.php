<x-layout>

@include('partials._hero')
@include('partials._search')
@if (count([$listings]) == 0) <p>No Listings</p>
@else 

<div class="row ">
 @foreach ($listings as $listing)
 <x-listing-card :listing=$listing />
@endforeach   

@endif
</div>
<div class="pagination row">
    <li class="page-item"> {{$listings->links()}} </li>
  
 </div>
</x-layout>
