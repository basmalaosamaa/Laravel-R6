<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;

// Route::get('', function () {
//     return view('welcome');
// });

Route::get('contact' ,[ExampleController::class , 'contact']);
Route::post('contactdata' , [ExampleController::class , 'recieve'])->name('data');
Route::get('cars/create',[CarController::class , 'create']);
Route::post('cars',[CarController::class , 'store'])->name('cars.store');


// Route::fallback(function () {
//         return redirect('/');
//     });

// Route::get('login',[ExampleController::class , 'login']);

// Route::post('receive', function () {
//     return "done";
// })->name('receive');

// Route::get('link' ,function(){
//     $url = route('w');
// return "<a href='$url'>Go to welcome</a>";
// });
// Route::get('welcome' ,function(){
//     return "Welcome to laravel";
//     })->name('w');

// Route::get('cv', function () {
//     return view('cv');
// });
//or
// Route::view('cv' , 'cv'); but it's not the best practise

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

// task

// Route::prefix('accounts')->group(function () {
//     Route::get('', function () {
//         return 'Accounts Index';
//     });
//     Route::get('admin', function () {
//         return 'Account Admin';
//     });
//     Route::get('user', function () {
//         return 'Account User';
//     });
// });

// Route::prefix('cars')->group(function () {
//     Route::get('', function () {
//         return 'Cas Index';
//     });
//     Route::prefix('usa')->group(function () {
//         Route::get('ford', function () {
//             return "cars ford";
//         });
//         Route::get('tesla', function () {
//             return "Hello tesla";
//         });
//     });
//     Route::prefix('ger')->group(function () {
//         Route::get('mercedes', function () {
//             return "cars mercedes";
//         });
//         Route::get('audi', function () {
//             return "Hello audi";
//         });
//         Route::get('volkswagen', function () {
//             return "Hello volkswagen";
//         });
//     });
// });
// end task

//we make this code after we finish the application and make sure we didn't make any error - make this code Just before submitted the application-.
// Route::fallback(function () {
//     return redirect('/');
// });
