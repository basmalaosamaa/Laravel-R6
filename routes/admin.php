<?php
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        Route::prefix('cars')->controller(CarController::class)->as('cars.')->middleware('verified')->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('create', 'create');
            Route::post('', 'store')->name('store');
            Route::get('{car}/edit', 'edit')->name('edit');
            Route::put('{id}', 'update')->name('update');
            Route::get('{car}/show', 'show')->name('show');
            Route::delete('{id}/delete', 'destroy')->name('destroy');
            Route::get('trashed', 'showDeleted')->name('showDeleted');
            Route::patch('{id}', 'restore')->name('restore');
            Route::delete('{id}', 'forceDelete')->name('permanentDelete');
            });
    });
    





?>