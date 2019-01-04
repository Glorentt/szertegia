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
Route::get('curl','agent\timeController@Vicidial_login');
Route::get('time','agent\timeController@show_time');
Route::get('paysheet','agent\timeController@paysheet');
Route::prefix('admin')->group(function (){
    Route::middleware(['admin'])->group(function(){
    //default route loged as admin
        Route::get('/', "admin\startController@index");
    //evaluations of programs
        Route::get('/qa-aftha-form','admin\aftha_program@showForm')->name('admin.aftha.form');
        Route::post('/qa-aftha-form','admin\aftha_program@store')->name('aftha.form.store');
    //handle users

        Route::post('users/password','admin\UserController@change_password')->name('admin.resetPassword');
        Route::get('users/password', function(){
          echo "string";
        })->name('admin.resetPasswordview');
        Route::resource('/users','admin\UserController')->names([
            'index'=>'admin.users.index',
            'store'=>'admin.users.store',
            'edit'=>'admin.users.edit',
            'update'=>'admin.users.update'
        ]);
        Route::resource('/showslingers','admin\ShowSlingerController')->names([
            'index'=>'admin.showslingers.index',
            'create'=>'admin.showslingers.store',
            'edit'=>'admin.showslingers.edit',
            'update'=>'admin.showslingers.update'
        ]);
        Route::resource('/casemanager','admin\CaseManagerController')->names([
            'index'=>'admin.case_manager.index',
            'store'=>'admin.case_manager.store',
            'edit'=>'admin.case_manager.edit',
            'update'=>'admin.case_manager.update'
        ]);
        Route::get('getAllUsers/data.json/all', ['uses' =>'admin\UserController@getAllUsers']);
        // Route::get('/getAllUsers','admin\UserController@getAllUsers');
        Route::get('liveSearchNames/{name}','admin\UserController@liveSearchNames')
            ->where(['name' => '[a-zA-Z]+']);
        Route::get('/liveSearchSupervisors/{name}','admin\UserController@liveSearchSupervisors')
            ->where(['name' => '[a-zA-Z]+']);
     //Register users
        Route::get('/register-users','loginController@showRegistrationForm')->name('show.users.form');
        Route::post('/register-users','loginController@register')->name('users.submit');
    //end Register users


    //Routes for Scores
    Route::get('/scoreAftha','admin\scoreController@index')->name('admin.aftha.score');
    Route::DELETE('/scoreAftha/{id}','admin\aftha_program@destroy')->name('admin.aftha.score.delete');
    Route::get('/scoreShowslinger','admin\scoreController@showslinger_scores')->name('admin.showslinger.score');
    Route::get('/getScores/data.json/all', ['uses' =>'admin\aftha_program@getAllScores']);
    Route::get('/getScoresShowslinger/data.json/all', ['uses' =>'admin\ShowSlingerController@getAllScores']);
    Route::get('/getcomments/{id}','admin\aftha_program@getComments');
    Route::get('/getcommentsShowslinger/{id}','admin\ShowSlingerController@getComments');

    });
});

// Route::prefix('qa')->group(function (){
//     Route::middleware(['qa'])->group(function(){
//     //default route loged as qa
//         Route::get('/', function () {
//             return view('qa.welcome');
//         });
//     //evaluations of programs
//         Route::get('/qa-aftha-form','qa\aftha_program@showForm')->name('qa.aftha.form');
//         Route::post('/qa-aftha-form','qa\aftha_program@store')->name('qa.form.store');
//     //handle users
//         Route::resource('/users','qa\UserController')->names([
//             'index'=>'qa.users.index',
//             'store'=>'qa.users.store'
//         ]);
//         Route::get('getAllUsers/data.json/all', ['uses' =>'qa\UserController@getAllUsers']);
//         // Route::get('/getAllUsers','qa\UserController@getAllUsers');
//         Route::get('liveSearchNames/{name}','qa\UserController@liveSearchNames')
//             ->where(['name' => '[a-zA-Z]+']);
//         Route::get('/liveSearchSupervisors/{name}','qa\UserController@liveSearchSupervisors')
//             ->where(['name' => '[a-zA-Z]+']);
//      //Register users
//
//     //end Register users
//
//
//     //Routes for Scores
//     Route::get('/scoreAftha','qa\scoreController@index')->name('qa.aftha.score');
//     Route::get('/getScores/data.json/all', ['uses' =>'qa\aftha_program@getAllScores']);
//
//     });
// });
// Route::prefix('supervisor')->group(function (){
//     Route::middleware(['supervisor'])->group(function(){
//     //default route loged as supervisor
//         Route::get('/', function () {
//             return view('supervisor.welcome');
//         });
//     //evaluations of programs
//         Route::get('/supervisor-aftha-form','supervisor\aftha_program@showForm')->name('supervisor.aftha.form');
//         Route::post('/supervisor-aftha-form','supervisor\aftha_program@store')->name('supervisor.form.store');
//     //handle users
//         Route::resource('/users','supervisor\UserController')->names([
//             'index'=>'supervisor.users.index',
//             'store'=>'supervisor.users.store'
//         ]);
//         Route::get('getAllUsers/data.json/all', ['uses' =>'supervisor\UserController@getAllUsers']);
//         // Route::get('/getAllUsers','supervisor\UserController@getAllUsers');
//         Route::get('liveSearchNames/{name}','supervisor\UserController@liveSearchNames')
//             ->where(['name' => '[a-zA-Z]+']);
//         Route::get('/liveSearchSupervisors/{name}','supervisor\UserController@liveSearchSupervisors')
//             ->where(['name' => '[a-zA-Z]+']);
//      //Register users

//     //end Register users


//     //Routes for Scores
//     Route::get('/scoreAftha','supervisor\scoreController@index')->name('supervisor.aftha.score');
//     Route::get('/getScores/data.json/all', ['uses' =>'supervisor\aftha_program@getAllScores']);

//     });
// });
//
// Route::prefix('agent')->group(function (){
//     Route::middleware(['agent'])->group(function(){
//         Route::get('/', function () {
//             return view('agent.welcome');
//         });
//
//     //Routes for Scores
//     Route::get('/scoreAftha','agent\aftha_program@index')->name('agent.aftha.score');
//     Route::get('/getScores/data.json/all', ['uses' =>'agent\aftha_program@getAllScores']);
//     Route::get('/scoreAftha/scoreAftha/my/data.json/my', ['uses' =>'agent\aftha_program@getMyScores']);
//     Route::get('/scoreAftha/my','agent\aftha_program@indexMyScores')->name('agent.aftha.myscore');
//     Route::get('/scoreAftha/getcomments/{id}','agent\aftha_program@getMyComments');
//     Route::post('/scoreAftha/my','agent\aftha_program@setAsRead');
//     Route::get('/getcomments/{id}','agent\aftha_program@getComments');
//     Route::resource('/showslingers','agent\ShowslingerController')->names([
//         'index'=>'agent.showslingers.index',
//         'store'=>'agent.showslingers.store',
//         'edit'=>'agent.showslingers.edit',
//         'update'=>'agent.showslingers.update'
//     ]);
//
//     });
// });

Route::get('/', function () {
    return view('login');
})->middleware('guest')->name('inicio');

Route::POST('/','loginController@login')->name('login.submit');
Route::get('/logout','loginController@logout')->name('logout');
