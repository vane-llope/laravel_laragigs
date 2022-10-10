<x-layout>
    <table class="text-center table table-striped table-hover mt-3 ">
        <thead>
            <tr>
              <h3>Manage Listings</h3>
            </tr>
        </thead>
        <tbody>
            @unless ($listings=='')
            @foreach ($listings as $listing)
            <tr  >
                <td class="text-start">{{$listing['title']}}</td>
                <td><a href="/listings/{{$listing['id']}}/edit" class="nav-link text-success">Edit</a> </td>
                <td><a href="/listings/{{$listing['id']}}" class="nav-link text-success">show</a> </td>
                <td><form method="POST" action="/listings/{{$listing->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn text-danger">Delete</button>
                 </form></td>
            </tr>
            @endforeach
            @else
            <tr>
                <td>No Listings Found</td>
            </tr>
            @endunless
        </tbody>
    </table>
</x-layout>