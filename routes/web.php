<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TypeaheadController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\SegmentController;

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

// Route::get('/', 'PolicyController@read');
// Route::post('/create', 'PolicyController@create');
// Route::post('/update/{id}','PolicyController@update')->where('id', '[0-9]+');    
// Route::resource('/contacts', ContactController::class);//->middleware('auth:api');
// Route::resources(  
//     ['contact'=>'ContactController'] //,  
//     // 'student'=>'StudentController']  
//     );  

// Route::prefix('auth')->group(function () {
//     Route::post('/login', 'CommonController@login');
// });


Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/autocomplete-search', [TypeaheadController::class,'autocompleteSearch']);

// Route::middleware('auth:api')->group(function() {

    #Contact Policy
    Route::prefix('contact')->group(function () {
        Route::get('/' , [ContactController::class,'showContacts'])->name('contact.list');
        Route::get('/create', [ContactController::class,'createContact'])->name('contact.create');
        Route::post('/create', [ContactController::class,'saveContact']);
        Route::get('/edit/{id}', [ContactController::class,'getContact'])->name('contact.edit');
        Route::put('/edit/{id}', [ContactController::class,'saveContact'])->name('contact.update');
        Route::get('/delete/{id}', [ContactController::class,'deleteContact'])->name('contact.delete');
    });
    #endContact

    #Organization Policy
    Route::prefix('organization')->group(function () {
        Route::get('/' , [OrganizationController::class,'showOrganizations'])->name('organization.list');
        Route::get('/create', [OrganizationController::class,'createOrganization'])->name('organization.create');
        Route::post('/create', [OrganizationController::class,'saveOrganization']);
        Route::get('/edit/{id}', [OrganizationController::class,'getOrganization'])->name('organization.edit');
        Route::put('/edit/{id}', [OrganizationController::class,'saveOrganization'])->name('organization.update');
        Route::get('/delete/{id}', [OrganizationController::class,'deleteOrganization'])->name('organization.delete');
    });
    #endOrganization

    #Deal
    Route::get('/deal', [DealController::class,'index']);

    #Organization Policy
    Route::prefix('segment')->group(function () {
        Route::get('/' , [SegmentController::class,'showSegments'])->name('segment.list');
        Route::get('/create', [SegmentController::class,'createSegment'])->name('segment.create');
        Route::post('/create', [SegmentController::class,'saveSegment']);
        Route::get('/edit/{id}', [SegmentController::class,'getSegment'])->name('segment.edit');
        Route::put('/edit/{id}', [SegmentController::class,'saveSegment'])->name('segment.update');
        Route::get('/delete/{id}', [SegmentController::class,'deleteSegment'])->name('segment.delete');
    });
    #endOrganization

// });