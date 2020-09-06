<?php

use Illuminate\Support\Facades\Route;

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

//Fontend route
Route::get('/', 'FontendController@index')->name('fontendInfo');
//post controller fontend
Route::get('posts', 'PostController@index')->name('allposts');
Route::get('post/{post_tittle}', 'PostController@details')->name('post.details');
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('admin/post/pending','PostController@pending')->name('post.pending');
Route::post('subscribe/email/store','SubscribeController@store')->name('');

Route::group(['middleware'=>['auth']],function(){
  Route::post('favorite/{post}/add','FavoritController@add')->name('add.favoritepost');
  Route::post('comment/{post}','CommentController@store')->name('comment.store');
  Route::post('reply/{comment}','ReplyController@store')->name('reply.store');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']],function(){
  Route::get('dashboard','DashboardController@dashboard')->name('admindashboard');
//Backend dashboard
//setting controller
Route::get('settings','AdminSettingController@index')->name('admin.setting');
Route::put('settings/store','AdminSettingController@profile')->name('setting.profile');
Route::put('settings/user/password','AdminSettingController@password')->name('setting.password');
//Tag controller
   Route::resource('tag','TagController');
//category controller
   Route::resource('categorie','CategoryController');
//post controller
   Route::resource('post','PostController');
//pending post with post controller
   Route::get('postpending','PostController@pending')->name('pending');
   Route::put('post/approved/{id}','PostController@approved')->name('approved');
   Route::put('post/pending/{id}','PostController@post_pending')->name('post_pending');
 //subscribe
   Route::get('subscribe/email','SubscribeController@index')->name('');
//favorite post
  Route::get('favorite-post','FavoritController@index')->name('');

});

Route::group(['prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']],function(){
    Route::get('dashboard','DashboardController@authordashboard')->name('authordashboard');
    Route::resource('post','PostController');
    //setting controller
    Route::get('settings','SettingController@index')->name('author.setting');
    Route::put('settings/store','SettingController@profile')->name('author.setting.profile');
    Route::put('settings/user/password','SettingController@password')->name('author.setting.password');
    //favorite post
      Route::get('favorite-post','FavoritController@index')->name('author.favoritepost');
});
