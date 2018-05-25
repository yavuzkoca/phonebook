<?php


Route::get('/', function () {
    return view('welcome');
});

Route::resource('phonebook', 'PhonebookController');
Route::get('getPhonebook', 'PhonebookController@getPhonebook');
Route::get('pagination', 'PhonebookController@pagination');

Route::get('/{name}', function(){
    return redirect('/phonebook');
})->where('name', '[A-Za-z]+');