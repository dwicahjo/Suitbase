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

Route::get('/', function () {
    return redirect('home');
});
Route::get('/template', function () {
    return view('layoutTemplate');
});

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'inactive'], function() {

        Route::get('/home', 'HomeController@index');

        /*user*/
        Route::get('/createAccount', 'UserController@index');

        Route::post('/createAccount', 'UserController@postCreate');

        Route::get('/editProfile', ['as' => 'user.edit.current', 'uses' => 'UserController@viewEdit']);

        Route::get('/editProfile:{id}', 'UserController@viewEditUser');

        Route::post('/updateProfile', 'UserController@update');

        Route::post('/uploadImage', 'UserController@uploadImage');

        Route::get('/listOfUser', 'UserController@showListOfUser');

        Route::get('/myProfile', function () {
            return view('pages.user.myProfile');
        });

        Route::get('/userDetails:{id}', 'UserController@showDetail');

        Route::get('/resetUser:{id}', 'UserController@viewReset');

        Route::post('/reset:{id}', 'UserController@reset');

        Route::get('/download:{doc}', 'UserController@download');

        /* leave */
        Route::get('/createLeave', function () {
            return view('pages.leave.createLeave');
        });

        Route::post('/storeLeave', 'LeavesController@create');

        Route::get('/myLeave', 'LeavesController@viewMyList');

        Route::get('/myLeaves:{id}', 'LeavesController@viewMyDetails');

        Route::get('/listOfLeave', 'LeavesController@viewListof');

        Route::get('/leaveApproval:{id}', 'LeavesController@viewDetails');

        Route::get('/rejectLeave:{id}', 'LeavesController@reject');

        Route::get('/approveLeave:{id}', 'LeavesController@approve');

        Route::get('/editLeave:{id}', 'LeavesController@viewEdit');

        Route::post('/updateLeave', 'LeavesController@update');

        Route::get('/cancelLeave:{id}', 'LeavesController@cancel');

        /* remote */
        Route::get('/createRemote', function () {
            return view('pages.remote.createRemote');
        });

        Route::post('/storeRemote', 'RemotesController@create');

        Route::get('/myRemote', 'RemotesController@viewMyList');

        Route::get('/myRemotes:{id}', 'RemotesController@viewMyDetails');

        Route::get('/listOfRemote', 'RemotesController@viewListof');

        Route::get('/remoteApproval:{id}', 'RemotesController@viewDetails');

        Route::get('/rejectRemote:{id}', 'RemotesController@reject');

        Route::get('/approveRemote:{id}', 'RemotesController@approve');

        Route::get('/editRemote:{id}', 'RemotesController@viewEdit');

        Route::post('/updateRemote', 'RemotesController@update');

        Route::get('/cancelRemote:{id}', 'RemotesController@cancel');

        /* training */
        Route::get('/createTraining', 'TrainingController@index');

        Route::post('/createTraining', 'TrainingController@postTraining');

        Route::get('/detailTraining:{id}', 'TrainingController@showDetail');

        Route::get('/trainingApproval:{id}', 'TrainingController@showApproval');

        Route::get('/myTraining', 'TrainingController@showListOfMyTraining');

        Route::get('/listOfTraining', 'TrainingController@showListOfTraining');

        Route::get('/rejectTraining:{id}', 'TrainingController@reject');

        Route::get('/approveTraining:{id}', 'TrainingController@approve');

        Route::get('/editTraining:{id}', 'TrainingController@viewEdit');

        Route::post('/updateTraining', 'TrainingController@update');

        Route::get('/cancelTraining:{id}', 'TrainingController@cancel');

        /* procurement */
        Route::get('/createProcurement', function () {
            return view('pages.procurement.createProcurement');
        });

        Route::post('/storeProcurement', 'ProcurementsController@create');

        Route::get('/myProcurement', 'ProcurementsController@viewMyList');

        Route::get('/myProcurements:{id}', 'ProcurementsController@viewMyDetails');

        Route::get('/listOfProcurement', 'ProcurementsController@viewListof');

        Route::get('/rejectProcurement:{id}', 'ProcurementsController@reject');

        Route::get('/approveProcurement:{id}', 'ProcurementsController@approve');

        Route::get('/procurementApproval:{id}', 'ProcurementsController@viewDetails');

        Route::get('/editProcurement:{id}', 'ProcurementsController@viewEdit');

        Route::post('/updateProcurement', 'ProcurementsController@update');

        Route::get('/cancelProcurement:{id}', 'ProcurementsController@cancel');

        /* overtime */
        Route::get('/createOvertime', 'OvertimeController@index');

        Route::post('/createOvertime', 'OvertimeController@postOvertime');

        Route::get('/overtimeDetails:{id}', 'OvertimeController@showDetails');

        Route::get('/overtimeApproval:{id}', 'OvertimeController@showApproval');

        Route::get('/myOvertime', 'OvertimeController@showListOfMyOvertime');

        Route::get('/listOfOvertime', 'OvertimeController@showListOfOvertime');

        Route::get('/rejectOvertime:{id}', 'OvertimeController@reject');

        Route::get('/approveOvertime:{id}', 'OvertimeController@approve');

        Route::get('/editOvertime:{id}', 'OvertimeController@viewEdit');

        Route::post('/updateOvertime', 'OvertimeController@update');

        Route::get('/cancelOvertime:{id}', 'OvertimeController@cancel');

        /* survey */
        Route::get('/surveys', [
            'as' => 'survey.list', 'uses' => 'SurveysController@showListofSurveys'
            ]);
        Route::get('/surveys/form', [
            'as' => 'survey.form', 'uses' => 'SurveysController@showListOfSurveysForm'
            ]);
        Route::get('/surveys/list', [
            'as' => 'survey.list', 'uses' => 'SurveysController@showListofSurveys'
            ]);
        Route::get('/surveys/create',[
            'as' => 'survey.create', 'uses' => 'SurveysController@index'
            ]);
        Route::post('/surveys/create',[
            'as' => 'survey.postCreate', 'uses' => 'SurveysController@postSurvey'
            ]);
        Route::get('/surveys/fill/{id}', [
            'as' => 'survey.fill', 'uses' => 'SurveysController@fillSurvey'
            ]);
        Route::post('/surveys/fill/{id}', [
            'as' => 'survey.postFill', 'uses' => 'SurveyssController@postFillSurvey'
            ]);
        Route::get('/surveys/edit/{id}',[
            'as' => 'survey.edit', 'uses' => 'SurveysController@editSurveyForm'
            ]);
        Route::post('/surveys/edit/{id}',[
            'as' => 'survey.update', 'uses' => 'SurveysController@updateSurveyForm'
            ]);
        /* feedback */
        Route::get('/createFeedback', 'FeedbackController@index');

        Route::post('/createFeedback', 'FeedbackController@postFeedback');

        Route::get('/listOfFeedback', 'FeedbackController@showListOfFeedback');

        Route::get('/detailFeedback:{id}', 'FeedbackController@showDetail');

        /* appraisal */
        Route::get('/appraisals', [
            'as' => 'appraisal.list', 'uses' => 'AppraisalsController@showListofAppraisals'
            ]);
        Route::get('/appraisals/template', [
            'as' => 'appraisal.template', 'uses' => 'AppraisalsController@showListOfAppraisalsTemplate'
            ]);
        Route::get('/appraisals/list', [
            'as' => 'appraisal.list', 'uses' => 'AppraisalsController@showListofAppraisals'
            ]);
        Route::get('/appraisals/myappraisal', [
            'as' => 'appraisal.my', 'uses' => 'AppraisalsController@showMyAppraisals'
            ]);
        Route::get('/appraisals/create',[
            'as' => 'appraisal.create', 'uses' => 'AppraisalsController@index'
            ]);
        Route::post('/appraisals/create',[
            'as' => 'appraisal.postCreate', 'uses' => 'AppraisalsController@postAppraisal'
            ]);
        Route::get('/appraisals/fill/{id}', [
            'as' => 'appraisal.fill', 'uses' => 'AppraisalsController@fillAppraisal'
            ]);
        Route::post('/appraisals/fill/{id}', [
            'as' => 'appraisal.postFill', 'uses' => 'AppraisalsController@postFillAppraisal'
            ]);
        Route::get('/appraisals/edit/{id}',[
            'as' => 'appraisal.edit', 'uses' => 'AppraisalsController@editAppraisalTemplate'
            ]);
        Route::post('/appraisals/edit/{id}',[
            'as' => 'appraisal.update', 'uses' => 'AppraisalsController@updateAppraisalTemplate'
            ]);

        /* ini form aslinya guys*/
        Route::get('/forms', function () {
            return view('pages.formsTemplate');
        });
        Route::get('/a', function () {
            return view('pages.coba');
        });
        Route::get('/tb', function () {
            return view('tables');
        });
    });
});
