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

Route::get('/', 'PagesController@index');
Route::get('/{product}/view', 'PagesController@show');
Route::get('/products', 'PagesController@showAll');
Route::get('/products/{category}/category', 'PagesController@showCategory');

Route::get('/about-us', function () {
    return view('pages/about');
});
Route::get('/benefits', function () {
    return view('pages/benefits');
});
Route::get('/return-refund-policy', function () {
    return view('pages/return');
});
Route::get('/terms-and-conditions', function () {
    return view('pages/terms');
});

Route::get('/blog', 'BlogController@index');
Route::get('/blog/post/{slug}', 'BlogController@show');
Route::post('/post/{slug}', 'BlogController@moreComments');
Route::post('/blog/post', 'CommentsController@store');

Route::get('/admin_dashboard/login', function () {
    return view('admin_dashboard/pages/login');
});

// PRODUCTS ROUTE
Route::get('/admin_dashboard', 'ProductsController@index');
Route::get('/search', 'PagesController@search');
Route::get('/admin_dashboard/products/{product}/view', 'ProductsController@edit');
Route::get('/admin_dashboard/products/new', 'ProductsController@create');
Route::post('/admin_dashboard/products', 'ProductsController@store');
Route::patch('/admin_dashboard/{product}/products', 'ProductsController@update');
Route::delete('/admin_dashboard/{product}/products', 'ProductsController@destroy');
Route::get('/admin_dashboard/products/search', 'ProductsController@show');
Route::get('/admin_dashboard/products/{category}/category', 'ProductsController@showCategory');

// BLOG ROUTE
Route::get('/admin_dashboard/blog', 'PostsController@index');
Route::post('/admin_dashboard/blog', 'PostsController@store');
Route::get('/admin_dashboard/blog/{post}/edit', 'PostsController@edit');
Route::patch('/admin_dashboard/blog/{post}', 'PostsController@update');
Route::delete('/admin_dashboard/blog/{post}', 'PostsController@destroy');

Route::get('/admin_dashboard/blog/new', function () {
    return view('admin_dashboard/pages/blog/new');
});
Route::get('/admin_dashboard/blog/comments', 'PostsController@showComments');
Route::get('/admin_dashboard/blog/comment/{id}/reply', 'PostsController@readComments');
Route::post('/admin_dashboard/blog/comment/{id}/reply', 'PostsController@replyComments');
Route::patch('/admin_dashboard/blog/comment/{id}/reply', 'PostsController@updateComments');
Route::delete('/admin_dashboard/blog/comment/{comment}/reply', 'PostsController@destroyComments');
Route::patch('/admin_dashboard/blog/reply/{reply}', 'PostsController@updateReply');
Route::delete('/admin_dashboard/blog/reply/{id}', 'PostsController@destroyReply');
Route::get('/admin_dashboard/blog/reply/{id}', 'PostsController@editReply');

Auth::routes([
    // 'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);