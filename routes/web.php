<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');  //use the controller ListingController index function for this
//store listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth'); //->middleware('auth') is found in the middleware Authenticate.php

//show edit date
Route::get('/listing/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');  //use the controller ListingController index function for this
//show edit to submit update
Route::put('/listing/{listing}/update', [ListingController::class, 'update'])->middleware('auth');  //use the controller ListingController index function for this

//perform delete action
Route::delete('/listing/{listing}/delete', [ListingController::class, 'destroy'])->middleware('auth');  //use the controller ListingController index function for this

// Manage Listing
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// [HARD NOTE: PUT ALL ROUTE THAT GETS VALUES BELOW]
//passing data to a php page //Single Listing
Route::get('/listing/{listing}', [ListingController::class, 'show']); 

// show register/create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest'); //->middleware('guast') for guest only
// If UserController does not exist, create one
// >    php artisan make:controller UserController
// create user form
Route::post('/users', [UserController::class, 'store']);

// Logout Request
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');//->name('login') will be used for user aithetication middleware
// login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



