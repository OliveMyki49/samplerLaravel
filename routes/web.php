<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Models\Listing; //use models specifically the model class
//use App\Models\ListingManualCreated; //use models specifically the model class

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Original*/
// Route::get('/', function () {
//     return view('welcome');
// });


//Common Resouce Routes:
// index - show all listings
// show - show single listing
// create - show form to create new listing
// store - store new listing
// edit - show form to edit listing 
// update - update listing
// destroy - delete listing


/*FOR DEMO ONLY*/
//sample route
Route::get('/sampler', function () {
    return response('<h1>Hello World<h1/>', 200)
        ->header('Content-Type', 'text/plain')
        ->header('foo', 'bar')/* custom header */;
});
//sample route with wildcard (value in url)
Route::get('/posts/{id}', function ($id) { //pass value from url
    //dd($id); // die and display the id
    //ddd($id); // die, display and debug the id
    return response('Post ' . $id);
})->where('id', '[0-9]+'); // only allow id to contain numbers
//sample request route
Route::get('/search', function (Request $request) {
    return $request->name . ' ' . $request->city . '';
});


//passing data to a php page //All Listing
Route::get('/', [ListingController::class, 'index']);  //use the controller LisintController index function for this

//show create form
Route::get('/listings/create', [ListingController::class, 'create']);  //use the controller ListingController index function for this
//store listing data
Route::post('/listings', [ListingController::class, 'store']); 

//show edit date
Route::get('/listing/{listing}/edit', [ListingController::class, 'edit']);  //use the controller ListingController index function for this
//show edit to submit update
Route::put('/listing/{listing}/update', [ListingController::class, 'update']);  //use the controller ListingController index function for this

//perform delete action
Route::delete('/listing/{listing}/delete', [ListingController::class, 'destroy']);  //use the controller ListingController index function for this

// [HARD NOTE: PUT ALL ROUTE THAT GETS VALUES BELOW]
//passing data to a php page //Single Listing
Route::get('/listing/{listing}', [ListingController::class, 'show']); 


