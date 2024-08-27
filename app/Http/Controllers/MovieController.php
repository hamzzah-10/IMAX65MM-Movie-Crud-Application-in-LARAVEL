<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoviesListing;

class MovieController extends Controller
{
    //
    public function index()
    {
        $moviesListings = MoviesListing::all();
        return view('admin', ['heading' => 'Welcome to admin panel','moviesListings' => $moviesListings]);
    }
    public function home()
    {
        $moviesListings = MoviesListing::all();
        return view('home', ['heading' => 'Welcome to Carcks','moviesListings' => $moviesListings]);
    }
    public function signup(){
        return view('signup',['heading'=>'Please Enter Admin details']);
    }

    public function create(){
        return view('create', ['heading'=>'Add movies']);
    }
    public function store(Request $request){
        $MovieName = $request->input('MovieName');
        $ActorName = $request->input('ActorName');
        $imageURL = $request->input('image');
        $ReleasedDate = $request->input('ReleaseDate');

       

        // dd($MovieName,$ActorName,$imageURL,$ReleasedDate);
        $MoviesListing = new MoviesListing();
        $MoviesListing->MovieName = $MovieName;
        $MoviesListing->ActorName = $ActorName;
        $MoviesListing->image = $imageURL;
        $MoviesListing->ReleasedDate = $ReleasedDate;
        $MoviesListing->save(); //insert all data in the table
        return redirect()->route('Admin')->with('success', 'Movie Added successfully ');
    }
    public function edit($id)
    {
        $moviesListings = MoviesListing::find($id);
        return view('edit', ['heading' => 'Edit a Movie', 'moviesListings' => $moviesListings]);
    }
    public function update(Request $request)
    {
        $MovieName = $request->input('MovieName');
        $ActorName = $request->input('ActorName');
        $imageURL = $request->input('image');
        $ReleasedDate = $request->input('ReleaseDate');
        $id = $request->input('id');

        //
        $MoviesListing = MoviesListing::find($id);
        $MoviesListing->MovieName = $MovieName;
        $MoviesListing->ActorName = $ActorName;
        $MoviesListing->image = $imageURL;
        $MoviesListing->ReleasedDate = $ReleasedDate;
        $MoviesListing->save(); //insert all data in the table
        return redirect()->route('Admin')->with('success', 'Movie Updated successfully ');
    }

    public function destroy($id)
    {
        $MoviesListing = MoviesListing::find($id);
        $MoviesListing->delete();
        return redirect()->route('Admin')->with('success', 'A Movie has been deleted successfully.');
    }
}
