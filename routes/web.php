<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
/*Route::get('/',function(){
    return view('template');
});*/
/*Route::get('/2',function(){
    return view('template2');
});*/
Route::group(['middleware'=>['web']],function(){
    Route::get('/','HomeController@showHome');
    Route::get('/aboutUs','HomeController@aboutUs');
    Route::get('/contactUs','HomeController@contactUs');
    Route::get('/shoppingGuide','HomeController@shoppingGuide');
    Route::get('/accountNumber','HomeController@accountNumber');
    Route::get('/sendStuff','HomeController@sendStuff');
    Route::post('/search','HomeController@search');
    Route::get('/search/{category}','HomeController@search');
    Route::get('/category/{category}','HomeController@category');
    Route::get('/selectStuff/{table}/{id}','HomeController@selectStuff');
    Route::get('/brand/{category}','HomeController@brand');
    Route::get('/shoppingCart','ShoppingcartController@shoppingCart');
    Route::post('/getCity','ShoppingcartController@getCity');
    Route::post('/deleteStuff','ShoppingcartController@delete');
    Route::get('/customerInformation','ShoppingcartController@customerInformation');
    Route::get('/management','ManagementController@showPanel');
    Route::post('/showForm','ManagementController@showForm');
    Route::get('/showForm','ManagementController@showForm');
    Route::post('/addGuard','GuardController@addGuard');
    Route::post('/addGlass','GlassController@addGlass');
    Route::post('/addCharger','ChargerController@addCharger');
    Route::post('/updateGlass','GlassController@updateGlass');
    Route::post('/updateGuard','GuardController@updateGuard');
    Route::post('/updateCharger','ChargerController@updateCharger');
    Route::post('/updateCable','CableController@updateCable');
    Route::post('/updateAdaptor','AdaptorController@updateAdaptor');
    Route::post('/addCable','CableController@addCable');
    Route::post('/addAdaptor','AdaptorController@addAdaptor');
    Route::post('/addMemory','MemoryController@addMemory');
    Route::post('/updateMemory','MemoryController@updateMemory');
    Route::post('/addCarcharger','CarchargerController@addCarcharger');
    Route::post('/updateCarcharger','CarchargerController@updateCarcharger');
    Route::post('/addBattry','BattryController@addBattry');
    Route::post('/updateBattry','BattryController@updateBattry');
    Route::post('/addHolder','HolderController@addHolder');
    Route::post('/updateHolder','HolderController@updateHolder');
    Route::post('/addSpeaker','SpeakerController@addSpeaker');
    Route::post('/updateSpeaker','SpeakerController@updateSpeaker');
    Route::post('/addFlashmemory','FlashmemoryController@addFlashmemory');
    Route::post('/updateFlashmemory','FlashmemoryController@updateFlashmemory');
    Route::post('/addHeadphone','HeadphoneController@addHeadphone');
    Route::post('/updateHeadphone','HeadphoneController@updateHeadphone');
    Route::post('/addHandsfree','HandsfreeController@addHandsfree');
    Route::post('/updateHandsfree','HandsfreeController@updateHandsfree');
    Route::post('/addAuxcable','AuxcableController@addAuxcable');
    Route::post('/updateAuxcable','AuxcableController@updateAuxcable');
    Route::post('/addMp3player','Mp3playerController@addMp3player');
    Route::post('/updateMp3player','Mp3playerController@updateMp3player');
    Route::post('/addCarmp3','Carmp3Controller@addCarmp3');
    Route::post('/updateCarmp3','Carmp3Controller@updateCarmp3');
    Route::post('/FindBy','ManagementController@FindBy');
    Route::post('/Find','ManagementController@Find');
    Route::post('/select','ManagementController@select');
    Route::post('/delete','ManagementController@delete');
    Route::get('/signUpForm','UserController@signUpForm');
    Route::post('/signUp','UserController@signUp');
    Route::get('/signInForm','UserController@signInForm');
    Route::post('/signIn','UserController@signIn');
    Route::post('/checkUsername','UserController@checkUsername');
    //Route::get('/checkUsername','UserController@checkUsername');

});