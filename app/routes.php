<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {
  return Redirect::to('ducks');
});

Route::get('ducks', function() 
{
  return View::make('duck-form');
});

// route to process the ducks form
Route::post('ducks', function()
{

  // process the form here

});
