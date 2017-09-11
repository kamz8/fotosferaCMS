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
Route::get('/','BlogController@index')->name('home');
    
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
            
            Route::get('/options', 'SettingsController@optionsShow')->middleware('can:admin-access');      
            Route::patch('/options', 'SettingsController@update')->middleware('can:admin-access');  
      
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

//resoure rute like image and anther media
Route::resource('stream', 'StreamController');
Route::get('stream/track/{id}','StreamController@listen' );
Route::get('media/image/{id}','Admin\FilesController@image')->name('image');
Route::get('media/image/thumbnail/{id}','Admin\FilesController@thumbnail')->name('thumbnail');
Route::get('media/image/cover/{id}','Admin\FilesController@cover')->name('cover');

//Blog route
Route::get('tag/{tag}','BlogController@tag')->name('tag');
Route::get('/archiwum/{year}/{month}','BlogController@archive')->name('archive');
//Gallery route
Route::get('/galeria','GalleryController@index');
Route::get('/galeria/{id}','GalleryController@showAlbum')->name('gallery');
Route::get('/p/{photo_id}','GalleryController@showPhoto')->name('showPhoto');

//and rest things 
Route::get('/o_mnie',  function (){
    SEO::setTitle('O mnie');

    return view('blog.about');
});

Route::get('/kontakt',  function (){

    return view('blog.contact');
});

Route::get('/post',  function (){
    SEO::setTitle('');

    return view('blog.post2');
});

Route::get('notifications','NotificationsController@stream');


Route::get('/install/{key?}',  ['as' => 'install', function($key = null)
{
       
    if($key == 'QER^Orf%&**(okjhgf3567890'){
    try {
  
      echo '<br>init migrate:install...';
      echo Artisan::queue('migrate:install', ['--force' => true,]);
      echo 'done migrate:install';
     
      echo '<br>init with app tables migrations...';
      echo Artisan::queue('migrate', [
        '--path'     => "app/database/migrations",
          '--force' => true
        ]);
      echo '<br>done with app tables migrations';
      echo '<br>init with Sentry tables seader...';
      echo Artisan::queue('db:seed',['--force' => true]);
      echo '<br>done with Sentry tables seader';

    } catch (Exception $e) {
      Response::make($e->getMessage(), 500);
    }
  }else{
      
    App::abort(404);
  }
}]);

Route::get('/route', function () {
    Artisan::queue('route:list');

    //
});

Route::get('/{slug}','BlogController@showPost');