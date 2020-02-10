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

Route::get('/', 'WelcomeController@index');

Route::get('list-article','WelcomeController@list')->name('home-list');

Route::get('content/{slug}','WelcomeController@content')->name('content-detail');

Route::get('categoried/article/{category}','WelcomeController@categoried')->name('categoried-article');

Route::get('tagged/article/{tag}','WelcomeController@tagged')->name('tagged-article');

Route::get('detail/profile/{id}','ProfileController@index')->name('detail-profile');

Route::get('search','WelcomeController@search')->name('search');


Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'], function(){

    Route::group(['middleware' => 'admin'], function(){
    // Category Route
    Route::resource('category' , 'CategoryController')->except('create' , 'show');
    // Tag Route
    Route::resource('tag' , 'TagController')->except('create', 'show');

    // User Route

    Route::get('user/trashcan' , 'UserController@trashcan')->name('user.trashcan');

    Route::get('user/trashlist','UserController@trashlist')->name('user.trashlist');

    Route::get('user/list' , 'UserController@list')->name('user-list');

    Route::get('user/restore/{id}' , 'UserController@restore')->name('user.restore');

    Route::delete('user/forcedelete/{id}','UserController@forcedelete')->name('user.force-delete');

    Route::resource('user','UserController')->except('create','store','edit');

    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

    
    });

    Route::get('profile' ,'UserController@profile')->name('user-profile')->middleware('verified');

    Route::post('updateprofile', 'UserController@updateprofile')->name('update-profile');
    // Post Route

    Route::get('post/trashcan','PostController@trashcan')->name('post.trashcan');

    Route::get('post/trashlist','PostController@trashlist')->name('post.trashlist');

    Route::delete('post/forcedelete/{id}', 'PostController@forcedelete')->name('post.force-delete');

    Route::get('post/restore/{id}', 'PostController@restore')->name('post.restore');

    Route::get('post/list','PostController@list')->name('list');

    Route::resource('post','PostController');

    
});

