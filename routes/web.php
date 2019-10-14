<?php

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::group(['middleware' => ['auth','admin']], function (){

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

    });

    Route::view('/profile','admin/profile')->name('profileadmin');
    Route::view('/blogAdmin','admin/blogAdmin')->name('blogAdmin');
    Route::resource('/product', 'ProductController');

        //FIN ADMINISTRADOR


    //vista de home menu rutas

    route::view('/perro','visitante/perro')->name('perro');
    route::view('/gato','visitante/gato')->name('gato');
    route::view('/otros','visitante/otros')->name('otros');
    route::view('/groming','visitante/groming')->name('groming');
    route::view('/politicas','visitante/politicas')->name('politicas');
    route::view('/blog','visitante/blog')->name('blog');
    route::view('/descripcion','visitante/descripcion')->name('descripcion');



