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

Route::get("/", "HomeController@index");
Route::get("/menu", "MenusController@menu")->name('menu');
Route::get("/about", "AboutsController@about")->name('about');
Route::get("/blog", "BlogsController@blog")->name('blog');
Route::get("/contact", "ContactsController@contact")->name('contact');
Route::get("/reservation", "ReservationsController@reservation")->name('reservation');
Route::get("/categories","CategoriesController@index");
Route::get('/categories/form','CategoriesController@create')->name('categories.create');
Route::post('categories/traitement','categoriesController@store');

//Route::get('/product',"ProductsController@index");
Route::resource('/products', 'ProductsController');

Route::get("/product/edit/{id}", "ProductsController@edit")->name('editer_produit');

Route::get('/product/create', 'ProductsController@create')->name('create_product')->middleware('auth');
Route::get('/abonnement/expired', "AbonnementController@expired");


Route::patch("/product/update/{id}", "ProductsController@update")->name('update_produit');
Route::delete("/delete/{id}","ProductsController@delete")->name('delete_produit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/produit/{slug}/show", 'ProductsController@show');