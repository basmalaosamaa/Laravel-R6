<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ExampleController;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return view('welcome');
});

// Route::get('contact' ,[ExampleController::class , 'contact']);
// Route::post('contactdata' , [ExampleController::class , 'recieve'])->name('data');

Route::prefix('cars')->group(function () {
Route::get('', [CarController::class, 'index'])->name('cars.index');
Route::get('create', [CarController::class, 'create']);
Route::post('', [CarController::class, 'store'])->name('cars.store');
Route::get('{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::put('{id}', [CarController::class, 'update'])->name('cars.update');
Route::get('{car}/show', [CarController::class, 'show'])->name('cars.show');
Route::delete('{id}/delete', [CarController::class, 'destroy'])->name('cars.destroy');
Route::get('trashed', [CarController::class, 'showDeleted'])->name('cars.showDeleted');
Route::patch('{id}', [CarController::class, 'restore'])->name('cars.restore');
Route::delete('{id}', [CarController::class, 'forceDelete'])->name('cars.permanentDelete');
});
Route::get('uploadForm' , [ExampleController::class , 'uploadForm']);
Route::post('upload' , [ExampleController::class , 'upload'])->name('upload');
//Task
Route::prefix('classes')->group(function () {

    Route::get('', [ClassroomController::class, 'index'])->name('classes.index');
    Route::get('create', [ClassroomController::class, 'create'])->name('classes.create');
    Route::post('', [ClassroomController::class, 'store'])->name('classes.store');
    Route::get('{class}/edit', [ClassroomController::class, 'edit'])->name('classes.edit');
    Route::put('{id}', [ClassroomController::class, 'update'])->name('classes.update');
    Route::get('{class}/show', [ClassroomController::class, 'show'])->name('classes.show');
    Route::delete('{id}/delete', [ClassroomController::class, 'destroy'])->name('classes.destroy');
    Route::get('trashed', [ClassroomController::class, 'showDeleted'])->name('classes.showDelete');
    Route::patch('{id}', [ClassroomController::class, 'restore'])->name('classes.restore');
    Route::delete('{id}', [ClassroomController::class, 'forceDelete'])->name('classes.forceDelete');
});
// Route::resource('classes' , ClassroomController::class);

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
