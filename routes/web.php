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
Route::get('leads','admin\LeadsController@index');
Route::get('time','agent\timeController@show_time');
Route::get('paysheet','agent\timeController@paysheet');
Route::prefix('admin')->group(function (){
    Route::middleware(['admin'])->group(function(){
        //default route loged as admin
        Route::get('/', "admin\startController@index");
        //evaluations of programs
        Route::get('/qa-aftha-form','admin\aftha_program@showForm')->name('admin.aftha.form');
        Route::post('/qa-aftha-form','admin\aftha_program@store')->name('aftha.form.store');
        //homeowners call programing
        Route::get('/qa-homeowners-form','admin\homeowners_program@showForm')->name('admin.homeowners.form');
        Route::post('/qa-homeowners-form','admin\homeowners_program@store')->name('homeowners.form.store');
        //forex call programing
        Route::get('/qa-forex-form','admin\forex_program@showForm')->name('admin.forex.form');
        Route::post('/qa-forex-form','admin\forex_program@store')->name('forex.form.store');
        //handle users
        Route::post('users/password','admin\UserController@change_password')->name('admin.resetPassword');
        Route::get('users/password', function(){ echo "string"; })->name('admin.resetPasswordview');
        //Answers
        Route::GET('/answers/{id}/edit','admin\AnswerController@edit')->name('admin.answers.edit');
        Route::GET('/answers/{id}','admin\AnswerController@show')->name('admin.answers.show');
        Route::DELETE('/answers/{id}','admin\AnswerController@destroy')->name('admin.answers.destroy');
        Route::resource('/answers','admin\AnswerController')->names([
            'index'=>'admin.answers.index',
            'store'=>'admin.answers.store',
            'destroy'=>'admin.answers.destroy',
        ]);
        //Questions
        Route::GET('/questions/{id}/edit','admin\QuizController@edit')->name('admin.questions.edit');
        Route::GET('/questions/{id}','admin\QuizController@show')->name('admin.questions.show');
        Route::DELETE('/questions/{id}','admin\QuizController@destroy')->name('admin.questions.destroy');
        Route::resource('/questions','admin\QuizController')->names([
            'index'=>'admin.questions.index',
            'store'=>'admin.questions.store',
            'destroy'=>'admin.questions.destroy',
        ]);
        //Forms
        Route::GET('/forms/{id}/edit','admin\FormController@edit')->name('admin.forms.edit');
        Route::GET('/forms/{id}','admin\FormController@show')->name('admin.forms.show');
        Route::DELETE('/forms/{id}','admin\FormController@destroy')->name('admin.forms.destroy');
        Route::resource('/forms','admin\FormController')->names([
            'index'=>'admin.forms.index',
            'store'=>'admin.forms.store',
            // 'edit'=>'admin.forms.edit',
            // 'update'=>'admin.forms.update',
            'destroy'=>'admin.forms.destroy',
        ]);
        //makeQuiz
        Route::resource('/makequizzes','admin\makeQuizController')->names([
            'index'=>'admin.makequizzes.index',
            // 'store'=>'admin.forms.store',
            // 'edit'=>'admin.forms.edit',
            // 'update'=>'admin.forms.update',
            // 'destroy'=>'admin.forms.destroy',
        ]);
        //Exam
        Route::resource('/exams','admin\ExamController')->names([
            'index'=>'admin.exams.index',
            // 'store'=>'admin.forms.store',
            // 'edit'=>'admin.forms.edit',
            // 'update'=>'admin.forms.update',
            // 'destroy'=>'admin.forms.destroy',
        ]);
        Route::resource('/users','admin\UserController')->names([
            'index'=>'admin.users.index',
            'store'=>'admin.users.store',
            'edit'=>'admin.users.edit',
            'update'=>'admin.users.update',
            'destroy'=>'admin.users.destroy'
        ]);
        Route::resource('/bizwell','admin\ShowSlingerController')->names([
            'index'=>'admin.showslingers.index',
            'store'=>'admin.showslingers.store',
            'edit'=>'admin.showslingers.edit',
            'update'=>'admin.showslingers.update'
        ]);
       
        Route::resource('/casemanager','admin\CaseManagerController')->names([
            'index'=>'admin.case_manager.index',
            'store'=>'admin.case_manager.store',
            'edit'=>'admin.case_manager.edit',
            'update'=>'admin.case_manager.update'
        ]);
        Route::resource('/forex','admin\ForexController')->names([
            'index'=>'admin.forex.index',
            'store'=>'admin.forex.store',
            'edit'=>'admin.forex.edit',
            'update'=>'admin.forex.update'
        ]);
        Route::resource('/homeowners','admin\HomeownersController')->names([
            'index'=>'admin.homeowners.index',
            'store'=>'admin.homeowners.store',
            'edit'=>'admin.homeowners.edit',
            'update'=>'admin.homeowners.update'
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

        //Routes Aftha for Scores
        Route::get('/scoreAftha','admin\scoreController@index')->name('admin.aftha.score');
        Route::get('/getcomments/{id}','admin\aftha_program@getComments');
        Route::get('/getScores/data.json/all', ['uses' =>'admin\aftha_program@getAllScores']);
        Route::DELETE('/scoreAftha/{id}','admin\aftha_program@destroy')->name('admin.aftha.score.delete');
        //Bizzwell scores
        Route::get('/getScoresShowslinger/data.json/all', ['uses' =>'admin\ShowSlingerController@getAllScores']);
        Route::get('/getcommentsShowslinger/{id}','admin\ShowSlingerController@getComments');
        Route::get('/scoreBizwell','admin\scoreController@showslinger_scores')->name('admin.showslinger.score');
        //Case managers scores
        Route::get('/scoreCase','admin\scoreController@casemanagers_scores')->name('admin.case.score');
        Route::get('/getScoresCase/data.json/all', ['uses' =>'admin\CaseManagerController@getAllScores']);
        Route::get('/getcommentsCase/{id}','admin\CaseManagerController@getComments');
        Route::DELETE('/scoreCase/{id}','admin\CaseManagerController@destroy')->name('admin.case.score.delete');
        //Forex scores
       
        //Homeowners scores
        Route::get('/scoreHomeowners','admin\scoreController@homeowners_scores')->name('admin.homeowners.score');
        Route::get('/getScoresHomeowners/data.json/all', ['uses' =>'admin\HomeownersController@getAllScores']);
        Route::get('/getcommentsHomeowners/{id}','admin\HomeownersController@getComments');

        //LExington routes
        Route::get('lexington','admin\LexingtonController@index')->name('admin.lexington.form');
        Route::post('lexington','admin\LexingtonController@store')->name('admin.lexington.store');

        //Lexington Scores
        Route::get('/scoreLexington','admin\scoreController@lexington_scores')->name('admin.lexington.score');
       
        Route::get('/getScoresLexington/data.json/all', ['uses' =>'admin\LexingtonController@getAllScores']);
        Route::DELETE('/scoreLexington/{id}','admin\LexingtonController@destroy')->name('admin.lexington.score.delete');
        Route::get('/getcommentsLexington/{id}','admin\LexingtonController@getComments');

    //routes for sales 
        Route::get('/sales','admin\SalesController@index')->name('admin.sales');
        Route::get('sales/qualifier','admin\QualifierSalesController@index')->name('admin.sales.qualifier');
        Route::post('sales/qualifier/add','admin\QualifierSalesController@add')->name('admin.sales.qualifier.add');
        Route::post('sales/qualifier/minus','admin\QualifierSalesController@minus')->name('admin.sales.qualifier.minus');
    });
});

// Route::prefix('qa')->group(function (){
//     Route::middleware(['qa'])->group(function(){
//     //default route loged as qa
//         Route::get('/', function () {
//             return view('qa.welcome');
//         });
//     //evaluations of programs
//         Route::get('/qa-af tha-form','qa\aftha_program@showForm')->name('qa.af tha.form');
//         Route::post('/qa-af tha-form','qa\aftha_program@store')->name('qa.form.store');
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
//     Route::get('/score Aftha','qa\scoreController@index')->name('qa.af tha.score');
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
//         Route::get('/supervisor-af tha-form','supervisor\aftha_program@showForm')->name('supervisor.af tha.form');
//         Route::post('/supervisor-af tha-form','supervisor\aftha_program@store')->name('supervisor.form.store');
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
//     Route::get('/score Aftha','supervisor\scoreController@index')->name('supervisor.af tha.score');
//     Route::get('/getScores/data.json/all', ['uses' =>'supervisor\aftha_program@getAllScores']);

//     });
// });
//
Route::prefix('agent')->group(function (){
    Route::middleware(['agent'])->group(function(){
        Route::get('/', function () {
            return view('agent.welcome');
        });

        //Routes Aftha for Scores
        Route::get('/scoreAftha','agent\aftha_program@index')->name('agent.aftha.score');
        Route::get('/getScores/data.json/all', ['uses' =>'agent\aftha_program@getAllScores']);
        Route::get('/scoreAftha/scoreAftha/my/data.json/my', ['uses' =>'agent\aftha_program@getMyScores']);
        Route::get('/scoreCase/scoreCase/my/data.json/my', ['uses' =>'agent\CaseManagerController@getMyScores']);
   
        Route::get('/scoreCase/my','agent\CaseManagerController@indexMyScores')->name('agent.case.myscore');
        Route::get('/scoreCase/getcomments/{id}','agent\CaseManagerController@getMyComments');
        Route::post('/scoreCase/my','agent\CaseManagerController@setAsRead');

        Route::get('/scoreAftha/my','agent\aftha_program@indexMyScores')->name('agent.aftha.myscore');
        Route::get('/scoreAftha/getcomments/{id}','agent\aftha_program@getMyComments');
        Route::post('/scoreAftha/my','agent\aftha_program@setAsRead');
        Route::get('/getcomments/{id}','agent\aftha_program@getComments');

        //Case managers for scores
        Route::get('/scoreCaseAgent','agent\CaseManagerController@index')->name('agent.case.score');
        Route::get('/getScoresCase/data.json/all', ['uses' =>'agent\CaseManagerController@getAllScores']);
        Route::get('/getcommentsCase/{id}','agent\CaseManagerController@getComments');

        // Sudzy
        Route::get('/scoreSudzyAgent','agent\SudzyController@index')->name('agent.sudzy.score');
        Route::get('/getScoresSudzy/data.json/all', ['uses' =>'agent\SudzyController@getAllScores']);
        Route::get('/getcommentsSudzy/{id}','agent\SudzyController@getComments');
        
        // Bizwell
        Route::get('/scoreBizwellAgent','agent\BizwellController@index')->name('agent.bizwell.score');
        Route::get('/getScoresBizwell/data.json/all', ['uses' =>'agent\BizwellController@getAllScores']);
        Route::get('/getcommentsBizwell/{id}','agent\BizwellController@getComments');

        //Showslingers
        Route::resource('/showslingers','agent\ShowslingerController')->names([
            'index'=>'agent.showslingers.index',
            'store'=>'agent.showslingers.store',
            'edit'=>'agent.showslingers.edit',
            'update'=>'agent.showslingers.update'
        ]);

        //SMS
        Route::resource('/sms/sudzy','agent\ShowslingerController')->names([
            'index'=>'agent.showslingers.index',
            'store'=>'agent.showslingers.store',
            'edit'=>'agent.showslingers.edit',
            'update'=>'agent.showslingers.update'
        ]);

        //Lexington Routes
        Route::get('/scoreLexington/my','agent\LexingtonController@indexMyScores')->name('agent.lexington.myscore');
        Route::get('/scoreLexington/getcomments/{id}','agent\LexingtonController@getMyComments');
        Route::post('/scoreLexington/my','agent\LexingtonController@setAsRead');
        Route::get('/scoreLexington/scoreLexington/my/data.json/my', ['uses' =>'agent\LexingtonController@getMyScores']);

        //Notes
        Route::resource('/notes','agent\NotesController')->names([
            'index'=>'agent.notes',
            'store'=>'agent.note.store'
        ]);
        //sales
        Route::get('/sales','agent\SalesController@index')->name('agent.sales');
        Route::get('sales/qualifier','agent\QualifierSalesController@index')->name('agent.sales.qualifier');
        //tracktime
        Route::get('tracktime','agent\TracktimeController@index')->name('agent.tracktime');
        Route::post('tracktime','agent\TracktimeController@store')->name('agent.tracktime.store');
        Route::post('tracktime/pause','agent\TracktimeController@break')->name('agent.tracktime.break');
       
    });
});

Route::get('/', function () {
    return view('login');
})->middleware('guest')->name('inicio');

Route::POST('/','loginController@login')->name('login.submit');
Route::get('/logout','loginController@logout')->name('logout');
