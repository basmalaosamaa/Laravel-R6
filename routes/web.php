<?php

use Illuminate\Support\Facades\Route;

// Route::get('accounts', function () {
//     return view('welcome');
// });

// Route::get('/w', function () {
//     return "Hello Laravel!";
// });

// Route::get('product/{id}', function ($id) {
//     return "product number is " . $id;
// });

// Route::get('product/{id?}', function ($id=1) {
//     return "product number is " . $id;
// });

// Route::get('product/{id?}', function ($id=0) {
//     return "product number is " . $id;
// })->wherenumber('id');

// Route::get('user/{name}/{age}', function($name, $age){
//     return "Username is " . $name . " and age is " . $age;
// })->whereAlpha('name')->whereNumber('age');

// Route::get('user/{name}/{age?}', function ($name, $age = null) {
//     if (isset($age)) {
//         $age = " and age is " . $age;
//     }
//     return "Username is " . $name . $age;
// })->where([
//     'name' => '[a-zA-Z]+',
//     'age' => '[0-9]+',
// ]);

// Route::get('movie/{category}', function ($category) {
//     return " movie category: " . $category;
// })->whereIn('category', ['horror', 'action', 'drama']);

Route::prefix('accounts')->group(function () {
    Route::get('', function () {
        return 'Accounts Index';
    });
    Route::get('admin', function () {
        return 'Account Admin';
    });
    Route::get('user', function () {
        return 'Account User';
    });
});

Route::prefix('cars')->group(function () {
    Route::get('', function () {
        return 'Cas Index';
    });
    Route::get('usa/{type}', function ($type) {
        return 'Car manufactured in USA : ' . $type;
    })->whereIn('type', ['ford', 'tesla']);
    Route::get('ger/{type}', function ($type) {
        return 'Car manufactured in GER : ' . $type;
    })->whereIn('type', ['mercedes', 'audi', 'volkswagen']);
});
