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
  // dd(App::environment());
});

// route to process the ducks form
Route::post('ducks', function()
{
  $rules = array(
    'name' => 'required',
    'email' => 'required|email|unique:ducks',
    'password' => 'required',
    'password_confirm' => 'required|same:password'
  );

  $validator = Validator::make(Input::all(), $rules);

  if ($validator->fails()) {
    $messages = $validator->messages();

    return Redirect::to('ducks')->withErrors($validator);
  } else {
    $duck = new Duck;
    $duck->name = Input::get('name');
    $duck->email = Input::get('email');
    $duck->password = Hash::make(Input::get('password'));

    $duck->save();

    if ($duck->save()) {
      return Redirect::to('ducks');
    }  else {
      return "There was an error with your entry. Please refresh the page and try again.";
    }
  }

});
