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


Route::get('/', function () {
    return view('welcome');
});
// PAGE
Route::get('/','HomeController@home')->name('page.home');
Route::get('noscript','HomeController@no_script')->name('page.noscript');
Route::get('lien-he','HomeController@contact')->name('page.contact');
Route::post('lien-he','HomeController@post_contact')->name('page.post-contact');
Route::get('tim-kiem','HomeController@search')->name('page.search');
Route::get('{slug}.html','HomeController@process_url')->name('page.cat');

// END-PAGE

Route::prefix('admink')->group(function() {
	Route::get('login','Admin\AuthController@getLogin')->name('admin.getLogin');
	Route::post('login','Admin\AuthController@postLogin')->name('admin.postLogin');
	Route::get('register','Admin\AuthController@getRegister')->name('admin.getRegister');
	Route::post('register','Admin\AuthController@postRegister')->name('admin.postRegister');
	Route::get('logout','Admin\PageController@getLogout')->name('admin.getLogout');

	// Dashboard
	Route::get('/','Admin\PageController@getIndex')->name('admin.dashboard');
	Route::get('dashboard','Admin\PageController@getIndex')->name('admin.dashboard');

	// Admins Management
	Route::prefix('admin-management')->group(function() {
		Route::get('/','Admin\AdminController@index')->name('admin.admin-management.index');
		Route::get('create','Admin\AdminController@create')->name('admin.admin-management.create');
		Route::post('create','Admin\AdminController@store')->name('admin.admin-management.store');
		Route::get('update/{id}','Admin\AdminController@edit')->name('admin.admin-management.edit');
		Route::post('update/{id}','Admin\AdminController@update')->name('admin.admin-management.update');
		Route::get('delete/{id}','Admin\AdminController@destroy')->name('admin.admin-management.delete');
		Route::get('view/{id}','Admin\AdminController@ajax_view')->name('admin.admin-management.ajax_view');
		Route::get('update-select-box-delete/{params}','Admin\AdminController@update_select_box_delete')->name('admin.admin-management.update-select-box-delete');
		Route::get('update-select-box-active/{params}','Admin\AdminController@update_select_box_active')->name('admin.admin-management.update-select-box-active');
		Route::get('update-select-box-inactive/{params}','Admin\AdminController@update_select_box_inactive')->name('admin.admin-management.update-select-box-inactive');
	});
	Route::prefix('categories-post')->group(function() {
		Route::get('/','Admin\CategoriesPostController@index')->name('admin.categories-post-management.index');
		Route::get('create','Admin\CategoriesPostController@create')->name('admin.categories-post-management.create');
		Route::post('create','Admin\CategoriesPostController@store')->name('admin.categories-post-management.store');
		Route::get('update/{id}','Admin\CategoriesPostController@edit')->name('admin.categories-post-management.edit');
		Route::post('update/{id}','Admin\CategoriesPostController@update')->name('admin.categories-post-management.update');
		Route::get('delete/{id}','Admin\CategoriesPostController@destroy')->name('admin.categories-post-management.delete');
		Route::get('view/{id}','Admin\CategoriesPostController@ajax_view')->name('admin.categories-post-management.ajax_view');
		Route::get('update-select-box-delete/{params}','Admin\CategoriesPostController@update_select_box_delete')->name('admin.categories-post-management.update-select-box-delete');
		Route::get('update-select-box-active/{params}','Admin\CategoriesPostController@update_select_box_active')->name('admin.categories-post-management.update-select-box-active');
		Route::get('update-select-box-inactive/{params}','Admin\CategoriesPostController@update_select_box_inactive')->name('admin.categories-post-management.update-select-box-inactive');
	});
	Route::prefix('posts')->group(function() {
		Route::get('/','Admin\PostsController@index')->name('admin.posts-management.index');
		Route::get('create','Admin\PostsController@create')->name('admin.posts-management.create');
		Route::post('create','Admin\PostsController@store')->name('admin.posts-management.store');
		Route::get('update/{id}','Admin\PostsController@edit')->name('admin.posts-management.edit');
		Route::post('update/{id}','Admin\PostsController@update')->name('admin.posts-management.update');
		Route::get('delete/{id}','Admin\PostsController@destroy')->name('admin.posts-management.delete');
		Route::get('view/{id}','Admin\PostsController@ajax_view')->name('admin.posts-management.ajax_view');
		Route::get('update-select-box-delete/{params}','Admin\PostsController@update_select_box_delete')->name('admin.posts-management.update-select-box-delete');
		Route::get('update-select-box-active/{params}','Admin\PostsController@update_select_box_active')->name('admin.posts-management.update-select-box-active');
		Route::get('update-select-box-inactive/{params}','Admin\PostsController@update_select_box_inactive')->name('admin.posts-management.update-select-box-inactive');
	});
	Route::prefix('pages')->group(function() {
		Route::get('/','Admin\PagesController@index')->name('admin.pages-management.index');
		Route::get('create','Admin\PagesController@create')->name('admin.pages-management.create')->middleware('checkRoleAdmin');
		Route::post('create','Admin\PagesController@store')->name('admin.pages-management.store')->middleware('checkRoleAdmin');
		Route::get('update/{id}','Admin\PagesController@edit')->name('admin.pages-management.edit');
		Route::post('update/{id}','Admin\PagesController@update')->name('admin.pages-management.update');
		Route::get('delete/{id}','Admin\PagesController@destroy')->name('admin.pages-management.delete')->middleware('checkRoleAdmin');
		Route::get('view/{id}','Admin\PagesController@ajax_view')->name('admin.pages-management.ajax_view');
		Route::get('update-select-box-delete/{params}','Admin\PagesController@update_select_box_delete')->name('admin.pages-management.update-select-box-delete');
		Route::get('update-select-box-active/{params}','Admin\PagesController@update_select_box_active')->name('admin.pages-management.update-select-box-active');
		Route::get('update-select-box-inactive/{params}','Admin\PagesController@update_select_box_inactive')->name('admin.pages-management.update-select-box-inactive');
	});
	Route::prefix('images/{type}')->group(function() {
		Route::get('/','Admin\ImagesController@index')->name('admin.images.index');
		Route::get('create','Admin\ImagesController@create')->name('admin.images.create');
		Route::post('create','Admin\ImagesController@store')->name('admin.images.store');
		Route::get('update/{id}','Admin\ImagesController@edit')->name('admin.images.edit');
		Route::post('update/{id}','Admin\ImagesController@update')->name('admin.images.update');
		Route::get('delete/{id}','Admin\ImagesController@destroy')->name('admin.images.delete');
		Route::get('view/{id}','Admin\ImagesController@ajax_view')->name('admin.images.ajax_view');
		Route::get('update-select-box-delete/{params}','Admin\ImagesController@update_select_box_delete')->name('admin.images.update-select-box-delete');
		Route::get('update-select-box-active/{params}','Admin\ImagesController@update_select_box_active')->name('admin.images.update-select-box-active');
		Route::get('update-select-box-inactive/{params}','Admin\ImagesController@update_select_box_inactive')->name('admin.images.update-select-box-inactive');
	});
	Route::prefix('contact')->group(function() {
		Route::get('/','Admin\ContactController@index')->name('admin.contact-management.index');
		Route::get('delete/{id}','Admin\ContactController@destroy')->name('admin.contact-management.delete');
		Route::get('view/{id}','Admin\ContactController@ajax_view')->name('admin.contact-management.ajax_view');
		Route::get('update-select-box-delete/{params}','Admin\ContactController@update_select_box_delete')->name('admin.contact-management.update-select-box-delete');
		Route::get('update-select-box-active/{params}','Admin\ContactController@update_select_box_active')->name('admin.contact-management.update-select-box-active');
		Route::get('update-select-box-inactive/{params}','Admin\ContactController@update_select_box_inactive')->name('admin.contact-management.update-select-box-inactive');
	});
	Route::prefix('configs-text')->group(function() {
		Route::get('/','Admin\ConfigsTextController@index')->name('admin.configs-text.index');
		Route::post('/','Admin\ConfigsTextController@update')->name('admin.configs-text.update');
		Route::get('seo','Admin\ConfigsTextSeoController@index')->name('admin.configs-text-seo.index');
		Route::post('seo','Admin\ConfigsTextSeoController@update')->name('admin.configs-text-seo.update');
		Route::get('advanced','Admin\ConfigsTextAdvancedController@index')->name('admin.configs-text-advanced.index');
		Route::post('advanced','Admin\ConfigsTextAdvancedController@update')->name('admin.configs-text-advanced.update');
	});
});
Route::get('doupload','Admin\PageController@upload_editor')->name('upload_editor');
Auth::routes();
