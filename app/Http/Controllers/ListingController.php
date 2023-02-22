<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    //show all listings
    public function index(){
        return view('listings.index', [ //this is the listings folder in view with index blade file
            'heading' => 'Latest Listing',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(10) //pass data from a model //Listing:: is an model connected to database
            //paginate takes data depending on how many parameters are taken in the program

            
           //'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplePaginate(2) //simple paginate only preivous and next without numbers
            //to add pagination run this to cmd
            //>php artisan vendor:publish

        ]);
    }

    //show single listing
    public function show(Listing $listing){ //pass in Listing as variable to abort 404 if data is not available
        return view('listings.show', [ //this is the listings folder in view with index blade file
            'heading' => 'Single Listing',
            'item' => $listing
        ]);
    }

    //show create form
    public function create(){
        return view('listings.create'); //path of a create blade form
    }
    //Store/insert listing data
    public function store(Request $request){
        //dd($request->file('logo'));
        $formFields = $request->validate([ //check if values are available before submiting for database input
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')], //RULE::unique will only take values that have no similraties to any value available in the table 'listings' in column 'company'
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',

            //'logo' => 'required|mimes:.JPG,.jpg,.png,.jpeg|max:5048'
            'logo' => 'required' //enable to send image file in database
        ]);

        if($request->hasFile('logo')){ //thsi will store the uploaded image in the public app file allong with its name extension in the database
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            //store('logos', 'public'); will create logos folder in the storage app
        }

        Listing::create($formFields); //this will be the query that will store the data such as the formFields

        return redirect('/')->with('message', 'Listing created successfully'); //go back home then display a message
    }

    //show edit form
    public function edit(Listing $listing){ //Listing is a model
        return view('listings.edit', ['listing' => $listing]);
    }
    //update list
    public function update(Request $request, Listing $listing){
        //dd($request->file('logo'));
        $formFields = $request->validate([ //check if values are available before submiting for database input
            'title' => 'required',
            'company' => 'required', //RULE::unique will only take values that have no similraties to any value available in the table 'listings' in column 'company'
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',

            //'logo' => 'required|mimes:.JPG,.jpg,.png,.jpeg|max:5048'
            'logo' => 'file' //enable to send image file in database
        ]);

        if($request->hasFile('logo')){ //thsi will store the uploaded image in the public app file allong with its name extension in the database
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            //store('logos', 'public'); will create logos folder in the storage app
        }

        $listing->update($formFields); //this will be the query that will update the data such as the formFields

        return back()->with('message', 'Listing created successfully'); //go back home then display a message
    }

    
    //Delete Item
    public function destroy(Listing $listing){ //Listing is a model
        $listing->delete();
        return redirect('/')->with('message', 'Item deleted successfully');
    }
}
