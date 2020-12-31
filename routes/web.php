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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/admin', 'Admin\AdminController@dashboard')->name('admin');
Route::get('/dashboard', 'Admin\AdminController@dashboard');


Route::resource('/post', 'Admin\PostController');
Route::resource('/category', 'Admin\CategoryController');
Route::resource('/setting', 'Admin\SettingController');

Route::post('getcategory', 'Admin\PostController@getcategory')->name('getcategory');



Route::get('/', 'Front\FrontController@index');
Route::get('/{district}', 'Front\FrontController@category')->name('category');
Route::get('/{district}/{category}', 'Front\FrontController@getListing')->name('list');
// Route::post('/search', 'Front\SearchController@index');
//http://routes.lo/serarch/district/searchresult
Route::post('/search', 'Front\SearchController@homesearch')->name('homesearch');
Route::get('/lists/{district}/{key}', 'Front\SearchController@homesearchres')->name('homesearchres');
Route::get('/lists/{district}/{area}/{key}', 'Front\SearchController@catsearchres')->name('catsearchres');
// Route::get('/lists/{district}/{area}/{key}', 'Front\SearchController@catsearchres')->name('listsearchres');

