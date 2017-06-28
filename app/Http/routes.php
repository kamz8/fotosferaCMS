<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//public apications routes
Route::get('/','homeController@index');
    
    
Route::group(['middleware' => ['web'] ], function () {
    
    //admin controll panel grouped routes
    Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware'=>'auth'], function () {
        
        Route::get('/', 'AdminController@index');
        Route::get('/settings','SettingsController@show');
        Route::get('/users','UsersController@show');
        Route::patch('/settings','SettingsController@updatePasswort');
        Route::resource('posts', 'PostController');
        Route::resource('albums', 'AlbumController');
        Route::resource('photos', 'PhotoController');
        Route::get('/files','FilesController@index');
        Route::group(['prefix' => 'api'], function () {
            
            Route::get('/', function () {
                
            return response()->json([
                'message'=>'FotosferaCMS api',
                'version'=>'0.0.1'
                ]);
            });
           
            Route::resource('/users','UsersController');
            Route::post('/users/serch','UsersController@serch');
            //Blog resorces
            Route::get('/posts','PostController@jsonGet');
            Route::post('/posts/serch','PostController@serch');
            //
            Route::get('/albums','AlbumController@jsonGet');
            Route::post('/albums/serch','AlbumController@serch');
            
            Route::resource('/files','FilesController');
            Route::get('/photos','PhotoController@jsonGet');
        });
            Route::get('/moderator', function () {
                
            return 'moderator tu zajrzeć może - admin też';
            })->middleware('can:moderator-access'); 
            
            Route::get('/options', function () {
                
            return view('admin.options');
            })->middleware('can:admin-access');      
            
        
        
    });//end admin group
    //
  
// Authentication Routes...
    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');

    // Registration Routes...
    Route::get('register', 'Auth\AuthController@showRegistrationForm');
    Route::post('register', 'Auth\AuthController@register');

// Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');    
});  

Route::resource('stream', 'StreamController');
Route::get('stream/track/{id}','StreamController@listen' );
Route::get('media/image/{id}','Admin\FilesController@image');
Route::get('media/image/thumbnail/{id}','Admin\FilesController@thumbnail');
Route::get('media/image/cover/{id}','Admin\FilesController@cover');
//Route::get('tag/{tag}','PostController@withTag');
Route::get('/galeria',  function (){

    return view('blog.gallery');
});

Route::get('/o_mnie',  function (){
    SEO::setTitle('O mnie');

    return view('blog.about');
});

Route::get('/kontakt',  function (){

    return view('blog.contact');
});

Route::get('/post',  function (){
    SEO::setTitle('');

    return view('blog.post');
});

Route::get('exif/{id}', 'Admin\FilesController@exif'); 

Route::get('notifications','NotificationsController@stream');


Route::get('/myapp/install/{key?}',  ['as' => 'install'], function($key = null)
{
    if($key == env('APP_KEY')){
    try {
      echo '<br>init migrate:install...';
      Artisan::call('migrate:install');
      echo 'done migrate:install';
      
      echo '<br>init with Sentry tables migrations...';
      Artisan::call('migrate', [
        '--package'=>'cartalyst/sentry'
        ]);
      echo 'done with Sentry';
      echo '<br>init with app tables migrations...';
      Artisan::call('migrate', [
        '--path'     => "app/database/migrations"
        ]);
      echo '<br>done with app tables migrations';
      echo '<br>init with Sentry tables seader...';
      Artisan::call('db:seed');
      echo '<br>done with Sentry tables seader';
    } catch (Exception $e) {
      Response::make($e->getMessage(), 500);
    }
  }else{
    App::abort(404);
  }
});