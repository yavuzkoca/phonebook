<?php


Route::get('/', function () {
    return view('welcome');
});

Route::resource('phonebook', 'PhonebookController');

Route::get('/{name}', function(){
    return redirect('/phonebook');
})->where('name', '[A-Za-z]+');