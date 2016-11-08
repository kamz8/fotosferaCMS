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
Route::get('stream/audio/track/{id}','StreamController@listen' );

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

Route::get('exif', 'ExifController@index'); 

