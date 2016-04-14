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
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/', function () {
    if (Auth::user()) {
        return view('layoutTemplate'); //Page which you want to show for loged user.
    } else {
        return view('auth.login'); //You can redirect from here, if user is not logged in
    }
});
Route::get('/template', function () {
    return view('layoutTemplate');
});
/*user*/
/*Route::get('/createAccount', function () {
    return view('pages.user.createAccount');
});*/
Route::get('/createAccount', 'UserController@index');
Route::post('/createAccount', 'UserController@postCreate');
Route::get('/editProfile', function () {
    return view('pages.user.editProfile');
});
Route::get('/listOfUser', 'UserController@showListOfUser');
Route::get('/myProfile', function () {
    return view('pages.user.myProfile');
});
Route::get('/userDetails:{id}', 'UserController@showDetail');
Route::get('/resetUser', function () {
    return view('pages.user.resetUser');
});

/* leave */
Route::get('/createLeave', function () {
    return view('pages.leave.createLeave');
});

Route::post('/storeLeave', 'LeavesController@create');

Route::get('/myLeave', 'LeavesController@viewMyList');

Route::get('/myLeaves:{id}', 'LeavesController@viewMyDetails');

Route::get('/listOfLeave', 'LeavesController@viewListof');

Route::get('/leaveApproval:{id}', 'LeavesController@viewDetails');

Route::get('/editLeave:{id}', 'LeavesController@viewEdit');

/* remote */
Route::get('/createRemote', function () {
    return view('pages.remote.createRemote');
});

Route::post('/storeRemote', 'RemotesController@create');

Route::get('/myRemote', 'RemotesController@viewMyList');

Route::get('/myRemotes:{id}', 'RemotesController@viewMyDetails');

Route::get('/listOfRemote', 'RemotesController@viewListof');

Route::get('/remoteApproval:{id}', 'RemotesController@viewDetails');

Route::get('/editRemote', function () {
    return view('pages.remote.editRemote');
});

/* training */
Route::get('/createTraining', 'TrainingController@index');
Route::post('/createTraining', 'TrainingController@postTraining');
Route::get('/detailTraining:{id}', 'TrainingController@showDetail');
Route::get('/trainingApproval:{id}', 'TrainingController@showApproval');
Route::get('/myTraining', 'TrainingController@showListOfMyTraining');
Route::get('/listOfTraining', 'TrainingController@showListOfTraining');
Route::get('/editTraining', function () {
    return view('pages.training.editTraining');
});

/* procurement */
Route::get('/createProcurement', function () {
    return view('pages.procurement.createProcurement');
});

Route::post('/storeProcurement', 'ProcurementsController@create');

Route::get('/myProcurement', 'ProcurementsController@viewMyList');

Route::get('/myProcurements:{id}', 'ProcurementsController@viewMyDetails');

Route::get('/listOfProcurement', 'ProcurementsController@viewListof');

Route::get('/procurementApproval:{id}', 'ProcurementsController@viewDetails');

Route::get('/editProcurement', function () {
    return view('pages.procurement.editProcurement');
});

/* overtime */
Route::get('/createOvertime', 'OvertimeController@index');
Route::post('/createOvertime', 'OvertimeController@postOvertime');

Route::get('/overtimeDetails:{id}', 'OvertimeController@showDetails');
Route::get('/overtimeApproval:{id}', 'OvertimeController@showApproval');
Route::get('/myOvertime', 'OvertimeController@showListOfMyOvertime');
Route::get('/listOfOvertime', 'OvertimeController@showListOfOvertime');
Route::get('/editOvertime', function () {
    return view('pages.overtime.editOvertime');
});
/* survey */
Route::get('/createSurvey', function () {
    return view('pages.survey.createSurvey');
});
Route::get('/editSurvey', function () {
    return view('pages.survey.editSurvey');
});
Route::get('/listOfSurvey', function () {
    return view('pages.survey.listOfSurvey');
});
Route::get('/surveyDetails', function () {
    return view('pages.survey.surveyDetails');
});
Route::get('/fillSurvey', function () {
    return view('pages.survey.fillSurvey');
});
/* feedback */
Route::get('/createFeedback', 'FeedbackController@index');
Route::post('/createFeedback', 'FeedbackController@postFeedback');
Route::get('/listOfFeedback', 'FeedbackController@showListOfFeedback');
Route::get('/detailFeedback:{id}', 'FeedbackController@showDetail');
/* appraisal */
Route::get('/viewListAppraisalTemplate', function () {
    return view('pages.appraisal.viewListAppraisalTemplate');
});
Route::get('/myAppraisal', function () {
    return view('pages.appraisal.myAppraisal');
});
Route::get('/listofAppraisal', function () {
    return view('pages.appraisal.listofAppraisal');
});
Route::get('/createAppraisal', function () {
    return view('pages.appraisal.createAppraisal');
});
/* ini form aslinya guys*/
Route::get('/forms', function () {
    return view('pages.formsTemplate');
});
Route::get('/a', function () {
    return view('pages.panels-wells');
});
