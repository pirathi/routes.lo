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
Route::post('/savedata', 'Front\FrontController@savedata')->name('savedata');

Auth::routes();
Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
});
Route::match(['get', 'post'], 'password/reset', function(){
    return redirect('/');
});
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/post', 'Admin\PostController');
    Route::resource('/category', 'Admin\CategoryController');
    Route::resource('/setting', 'Admin\SettingController');  
    Route::get('/admin', 'Admin\AdminController@dashboard')->name('admin'); 
    Route::get('/dashboard', 'Admin\AdminController@dashboard');
    Route::post('/getarea', 'Admin\PostController@getarea')->name('getarea');
    Route::get('/category/{category}', 'Admin\PostController@categoryfilter')->name('categoryfilter');
});

Route::get('/getdata', 'Front\FrontController@getdata');






Route::resource('/add_listing', 'Front\PostController');




Route::post('getcate', 'Front\PostController@getcategory')->name('front.getcate');
Route::get('/', 'Front\FrontController@index');
Route::get('/{district}', 'Front\FrontController@category')->name('category');
Route::get('/{district}/{category}', 'Front\FrontController@getListing')->name('list');
Route::get('/listing/{district}/{category}/{slug}', 'Front\FrontController@details')->name('details');
// Route::post('/search', 'Front\SearchController@index');
//http://routes.lo/serarch/district/searchresult
Route::post('/search', 'Front\SearchController@homesearch')->name('homesearch');
Route::get('/lists/{district}/{key}', 'Front\SearchController@homesearchres')->name('homesearchres');
Route::get('/lists/{district}/{area}/{key}', 'Front\SearchController@catsearchres')->name('catsearchres');
// Route::get('/lists/{district}/{area}/{key}', 'Front\SearchController@catsearchres')->name('listsearchres');
Route::get('/{district}/{category}/{id}', 'Front\FrontController@listDescription')->name('description');


