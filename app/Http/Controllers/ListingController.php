<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ListingController extends Controller
{
    public function index(){
    
    return view('listings.index',[
        'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
    ]);
    }
    public function show(Listing $listing){
        return view('listings.show',['listing' => $listing]); 
    }

    public function create(){
        return view('listings.create'); 
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $img = $request->file('logo');
            $fileName =  $img->getClientOriginalName();
            $resized_image =  Image::make($img->getRealPath())->resize(500,300);
           //$resized_image =  Image::make($img->getRealPath())->resize(800,500);
            $resized_image->save(public_path('images/'.$fileName));
            $formFields['logo'] = $fileName;
        }

        $formFields['user_id'] = auth()->id();
        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }
    public function edit(Listing $listing){
       // dd($listing);
        return view('listings.edit',['listing'=>$listing]);
    }

    public function update(Request $request , Listing $listing) {
        //make sure logged in user is owner
        if($listing->user_id != auth()->id() ){
            abort('403','unathorized Action');
        }
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $img = $request->file('logo');
            $fileName =  $img->getClientOriginalName();
            $resized_image =  Image::make($img->getRealPath())->resize(500,300);
           //$resized_image =  Image::make($img->getRealPath())->resize(800,500);
            $resized_image->save(public_path('images/'.$fileName));
            $formFields['logo'] = $fileName;
        }

        $formFields['user_id'] = auth()->id();

        $listing->update($formFields);

        return redirect("/listings/{$listing->id}")->with('message', 'Listing updated successfully!');
    }
    public function destroy(Listing $listing) {
        if($listing->user_id != auth()->id() ){
            abort('403','unathorized Action');
        }
        $listing->delete();
        return redirect('/')->with('message','listing deleted successfully');
        } 

        public function manage(){
            return view('listings.manage',['listings'=> auth()->user()->listings()->get()]);
        }
}
