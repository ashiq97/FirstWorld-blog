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


Route::get('/test',function(){

 // dd(App\Category::find(2)->posts);// selecet * posts from category wrehe category_id = 3
 	// return App\Category::find(2)->posts;

	// return App\Post::find(2)->category; // selecet * category posts Tag wrehe post_id = 3
	//return App\Tag::find(3)->posts; // selecet * posts from Tag wrehe tag_id = 3
	return App\User::find(1)->profile;

});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');




Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){

	Route::get('/home', [
		
		'uses' => 'HomeController@index',
        
         'as' => 'home' 
        
         ]);

	Route::get('/posts',[

		'uses' => 'PostsController@index',

		'as' =>'posts'

	]);

	Route::get('/post/create',[

		'uses' => 'PostsController@create',

		'as' =>'post.create'

	]);

	Route::post('/post/store',[

		'uses' => 'PostsController@store',

		'as' =>'post.store'
	 
	]);

	// Route::post('/post/delete/{id}','PostsController@destroy');

	Route::get('/post/delete/{id}',[

		'uses' => 'PostsController@destroy',

		'as' =>'post.delete'
	 
	]);

	Route::get('/post/trashed',[

		'uses' => 'PostsController@trashed',

		'as' =>'post.trashed'
	 
	]);



	Route::get('/post/kill/{id}',[

		'uses' => 'PostsController@kill',

		'as' =>'post.kill'
	 
	]);


	Route::get('/post/resotre/{id}',[

		'uses' => 'PostsController@restore',

		'as' =>'post.restore'
	 
	]);


	Route::get('/post/edit/{id}',[

		'uses' => 'PostsController@edit',

		'as' =>'post.edit'
	 
	]);


	Route::post('/post/update/{id}',[

		'uses' => 'PostsController@update',

		'as' =>'post.update'
	 
	]);


	Route::get('/category/create',[

		'uses' => 'CategoriesController@create',

		'as' => 'category.create'
	]);

	Route::get('/categories',[

		'uses' => 'CategoriesController@index',

		'as' => 'categories'
	]);


	Route::post('/category/store',[

		'uses' => 'CategoriesController@store',

		'as' => 'category.store'
	]);


	Route::get('/category/edit/{id}',[

		'uses' => 'CategoriesController@edit',

		'as' => 'category.edit'
	]);

	Route::get('/category/delete/{id}',[

		'uses' => 'CategoriesController@destroy',

		'as' => 'category.delete'
	]);

	Route::post('/category/update/{id}',[

		'uses' => 'CategoriesController@update',

		'as' => 'category.update'
	]);

	////////     Tag    /////////////////
	
	Route::get('/tags',[

		'uses' => 'TagsController@index',
		 'as'  => 'tags'
	]);

	Route::get('/tag/create',[

		'uses' => 'TagsController@create',
		 'as'  => 'tag.create'
	]);


	Route::post('/tag/store',[

		'uses' => 'TagsController@store',
		 'as'  => 'tag.store'
	]);


	Route::get('/tag/edit/{id}',[

		'uses' => 'TagsController@edit',
		 'as'  => 'tag.edit'
	]);

	Route::post('/tag/update/{id}',[

		'uses' => 'TagsController@update',
		 'as'  => 'tag.update'
	]);

	Route::get('/tag/delete/{id}',[

		'uses' => 'TagsController@destroy',
		 'as'  => 'tag.delete'
	]);


	Route::get('/users',[
		'uses' => 'UsersController@index',
		'as' => 'users'


	]);

	Route::get('/users/create',[
	
		'uses' => 'UsersController@create',
		'as' => 'users.create'
	]);

	Route::post('/user/store',[
	
		'uses' => 'UsersController@store',
		'as' => 'user.store'
	]);

	Route::get('/user/admin/{id}',[
	
		'uses' => 'UsersController@admin',
		'as' => 'user.admin'
	]);
	
	Route::get('/user/not-admin/{id}',[
	
		'uses' => 'UsersController@not_admin',
		'as' => 'user.not.admin'
	]);

	Route::get('/user/profile',[
	
		'uses' => 'ProfilesController@index',
		'as' => 'user.profile'
	]);

	Route::get('/user/delete/{id}',[
	
		'uses' => 'UsersController@destroy',
		'as' => 'user.delete'
	]);

	Route::post('/user/profile/update',[
	
		'uses' => 'ProfilesController@update',
		'as' => 'user.profile.update'
	]);

	Route::get('/settings',[
	
		'uses' => 'SettingsController@index',
		'as' => 'settings'
	])->middleware('admin');


	Route::post('/settings/update',[
	
		'uses' => 'SettingsController@update',
		'as' => 'settings.update'
	])->middleware('admin');


});