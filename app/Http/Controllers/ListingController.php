<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    //show all listings
    public function index(){
        return view('listings.index', [ //this is the listings folder in view with index blade file
            'heading' => 'Latest Listing',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get() //pass data from a model //Listing:: is an model connected to database
        ]);
    }

    //show single listing
    public function show(Listing $listing){ //pass in Listing as variable to abort 404 if data is not available
        return view('listings.show', [ //this is the listings folder in view with index blade file
            'heading' => 'Single Listing',
            'item' => $listing
        ]);
    }
}
