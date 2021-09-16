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


Auth::routes(['verify' => true]);


Route::get('/', 'statsController@index')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/credits', 'credits')->name('credits');
Route::view('/docs/metadiablo-api', 'apidocs')->name('apidocs');
Route::view('privacy', 'privacy')->name('privacy');
Route::view('terms', 'terms')->name('terms');

//area levels
Route::get('/arealevels', 'areaLevelsController@index')->name('areaLevels');
//php artisan make:controller areaLevelsController --resource
Route::post('/arealevels', 'areaLevelsController@search')->name('areaLevelsSearch');;

Route::get('/testt', 'testController@index')->name('testt');

//after login -- we're not even using this currently. --
Route::get('/home', 'HomeController@index')->name('dash')->middleware('auth');

//runeword tool
Route::get('/runewordtool', 'rwtoolController@index')->name('rwtool');
Route::post('/runewordtool', 'rwtoolController@search')->name('rwToolSearch');

//profiles
Route::get('/profile/{id}-{name}', 'profileController@show')->name('profileView')->middleware('auth');
Route::get('/profile/update', 'profileController@update')->name('profileUpdate')->middleware('auth');
Route::post('/profile/update', 'profileController@postUpdate')->name('profilePostUpdate')->middleware('auth');

//categories
Route::get('/forum', 'CategoriesController@show')->name('forumCategories');
Route::get('/forum/create', 'CategoriesController@create')->name('forumCategoriesCreate')->middleware('can:isAdmin');

//threads
Route::get('/forum/{categorySlug}', 'ThreadsController@show')->name('forumThreads');
Route::get('/forum/{categorySlug}/create', 'ThreadsController@create')->name('forumThreadsCreate')->middleware('auth');
Route::post('/forum/{categorySlug}/store', 'ThreadsController@store')->name('forumThreadsStore')->middleware('auth');

//posts
Route::get('/forum/{categorySlug}/{threadSlug}', 'postsController@show')->name('forumPosts');
Route::get('/forum/{categorySlug}/{threadSlug}/create', 'postsController@create')->name('forumPostsCreate')->middleware('auth');
Route::post('/forum/{categorySlug}/{threadSlug}/store', 'postsController@store')->name('forumPostsStore')->middleware('auth');

//API
Route::view('/api', 'apidocs')->name('apidocs2');

//builds
//Route::view('/build/amazon', 'layouts.builds.create')->name('build-amazon')->middleware('auth');

//backstage

//isAllowed middleware handles controls to endpoints, the blade resources are shown based on gates. i.e. user will not see backstage link.\
//the middleware will ensure they cannot use the REST endpoints to fiddle with the database.
//php artisan make:controller backstageForumController --resource --model=backstageForum

Route::get('/backstage', 'BackstageController@show')->name('backstage')->middleware('can:isAdmin');
Route::get('/backstage/general', 'backstageGeneralController@show')->name('backstage-general')->middleware('can:isAdmin');
Route::get('/backstage/users', 'backstageUsersController@show')->name('backstage-users')->middleware('can:isAdmin');
Route::get('/backstage/forum', 'backstageForumController@show')->name('backstage-forum')->middleware('can:isAdmin');