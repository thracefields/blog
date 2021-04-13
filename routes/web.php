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
use App\User;
use App\Http\Resources\User as UserResource;


Route::get('/', 'PagesController@getWelcome')->name('welcome');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('manage')->group(function () {
    Route::get('/', 'Manage\ManageController@index');
    Route::get('/dashboard', 'Manage\ManageController@dashboard')->name('manage.dashboard');

    // Users
    Route::resource('/users', 'Manage\UserController', ['except' => 'destroy']);
   
    // Permissions
    Route::resource('/permissions', 'Manage\PermissionController', ['except' => 'destroy']);

    // Roles
    Route::resource('/roles', 'Manage\RoleController');

    // Articles
    Route::resource('/articles', 'Manage\ArticleController', ['as' => 'manage']);

    // Categories
    Route::resource('/categories', 'Manage\CategoryController', [
        'as' => 'manage',
        'except' => ['show']
    ]);

    // Tags
    Route::resource('/tags', 'Manage\TagController', [
        'as' => 'manage',
        'except' => ['show']
    ]);
    
    Route::prefix('discuss')->group(function () {
        // Forum Categories
        Route::resource('categories', 'Manage\ForumCategoryController', [
            'as' => 'manage.forums',
            'except' => ['create', 'show']
        ]);
    });
    
});

// Article
Route::resource('/articles', 'ArticleController', ['only' => ['show']]);
Route::post('/article/comment', 'ArticleController@comment')->name('articles.comment')->middleware('auth');


// Search
Route::get('/search', 'PagesController@getSearch')->name('search');

// Categories
Route::resource('/categories', 'CategoryController', ['only' => ['index', 'show']]);


// Tags
Route::resource('/tags', 'TagController', ['only' => ['index', 'show']]);

// Profile
Route::resource('profiles', 'ProfileController', ['except' => ['create', 'store', 'destroy']]);

// User Settings
Route::get('/settings/password', 'UserSettingsController@editPassword')->name('settings.password.edit');
Route::patch('/settings/password', 'UserSettingsController@updatePassword')->name('settings.password.update');

Route::get('/user/{id}', function ($id) {
    return new UserResource(User::find($id));
});
