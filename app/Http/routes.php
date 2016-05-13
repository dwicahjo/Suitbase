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

        Route::get('/home', [
            'as' => 'home', 'uses' => 'HomeController@index'
            ]);

        /*user*/
        Route::get('/user/create', [
            'as' => 'user.create', 'uses' => 'UserController@index'
            ]);

        Route::post('/user/create', [
            'as' => 'user.postCreate', 'uses' => 'UserController@postCreate'
            ]);

        Route::get('/user/edit/current', [
            'as' => 'user.edit.current', 'uses' => 'UserController@viewEdit'
            ]);

        Route::get('/user/edit/{id}', [
            'as' => 'user.edit', 'uses' => 'UserController@viewEditUser'
            ]);

        Route::post('/user/edit/post', [
            'as' => 'user.postEdit', 'uses' => 'UserController@update'
            ]);

        Route::post('/user/edit/post', [
            'as' => 'user.postImage', 'uses' => 'UserController@uploadImage'
            ]);

        Route::get('/user/list', [
            'as' => 'user.list', 'uses' => 'UserController@showListOfUser'
            ]);

        Route::get('/user/details/current', [
            'as' => 'user.details.current', function () {return view('pages.user.myProfile');}
            ]);

        Route::get('/user/details/{id}', [
            'as' => 'user.details', 'uses' => 'UserController@showDetail'
            ]);

        Route::get('/user/reset/{id}', [
            'as' => 'user.reset', 'uses' => 'UserController@viewReset'
            ]);

        Route::post('/user/reset:{id}', [
            'as' => 'user.postReset', 'uses' => 'UserController@reset'
            ]);

        Route::get('/user/details/download/{doc}', [
            'as' => 'user.details.download', 'uses' => 'UserController@download'
            ]);

        /* leave */
        Route::get('/leaves/create', [
            'as' => 'leaves.create', function() {return view('pages.leave.createLeave');}
            ]);

        Route::post('/leaves/create', [
            'as' => 'leaves.postCreate', 'uses' => 'LeavesController@create'
            ]);

        Route::get('/leaves/list/current', [
            'as' => 'leaves.list.current', 'uses' => 'LeavesController@viewMyList'
            ]);

        Route::get('/leaves/details/{id}', [
            'as' => 'leaves.details', 'uses' => 'LeavesController@viewMyDetails'
            ]);

        Route::get('/leaves/list/all', [
            'as' => 'leaves.list.all', 'uses' => 'LeavesController@viewListof'
            ]);

        Route::get('/leaves/approval/{id}', [
            'as' => 'leaves.approval', 'uses' => 'LeavesController@viewDetails'
            ]);

        Route::get('/leaves/approval/reject/{id}', [
            'as' => 'leaves.approval.reject', 'uses' => 'LeavesController@reject'
            ]);

        Route::get('/leaves/approval/approve/{id}', [
            'as' => 'leaves.approval.approve', 'uses' => 'LeavesController@approve'
            ]);

        Route::get('/leaves/edit/{id}', [
            'as' => 'leaves.edit', 'uses' => 'LeavesController@viewEdit'
            ]);

        Route::post('/leaves/edit/post', [
            'as' => 'leaves.postEdit', 'uses' => 'LeavesController@update'
            ]);

        Route::get('/leaves/cancel/{id}', [
            'as' => 'leaves.cancel', 'uses' => 'LeavesController@cancel'
            ]);

        /* remote */
        Route::get('/remotes/create', [
            'as' => 'remotes.create', function () {return view('pages.remote.createRemote');}
            ]);

        Route::post('/remotes/create', [
            'as' => 'remotes.postCreate', 'uses' => 'RemotesController@create'
            ]);

        Route::get('/remotes/list/current', [
            'as' => 'remotes.list.current', 'uses' => 'RemotesController@viewMyList'
            ]);

        Route::get('/remotes/details/{id}', [
            'as' => 'remotes.details', 'uses' => 'RemotesController@viewMyDetails'
            ]);

        Route::get('/remotes/list/all', [
            'as' => 'remotes.list.all', 'uses' => 'RemotesController@viewListof'
            ]);

        Route::get('/remotes/approval/{id}', [
            'as' => 'remotes.approval', 'uses' => 'RemotesController@viewDetails'
            ]);

        Route::get('/remotes/approval/reject/{id}', [
            'as' => 'remotes.approval.reject', 'uses' => 'RemotesController@reject'
            ]);

        Route::get('/remotes/approval/approve/{id}', [
            'as' => 'remotes.approval.approve', 'uses' => 'RemotesController@approve'
            ]);

        Route::get('/remotes/edit/{id}', [
            'as' => 'remotes.edit', 'uses' => 'RemotesController@viewEdit'
            ]);

        Route::post('/remotes/edit/post', [
           'as' => 'remotes.postEdit', 'uses' => 'RemotesController@update'
            ]);

        Route::get('/remotes/cancel/{id}', [
            'as' => 'remotes.cancel', 'uses' => 'RemotesController@cancel'
            ]);

        /* training */
        Route::get('/trainings/create', [
            'as' => 'trainings.create', 'uses' => 'TrainingController@index'
            ]);

        Route::post('/trainings/postCreate', [
            'as' => 'trainings.postCreate', 'uses' => 'TrainingController@postTraining'
            ]);

        Route::get('/trainings/list/current', [
            'as' => 'trainings.list.current', 'uses' => 'TrainingController@showListOfMyTraining'
            ]);

        Route::get('/trainings/details/{id}', [
            'as' => 'trainings.details', 'uses' => 'TrainingController@showDetail'
            ]);

        Route::get('/trainings/list/all', [
            'as' => 'trainings.list.all', 'uses' => 'TrainingController@showListOfTraining'
            ]);

        Route::get('/training/approval/{id}', [
            'as' => 'trainings.approval', 'uses' => 'TrainingController@showApproval'
            ]);

        Route::get('/trainings/approval/reject/{id}', [
            'as' => 'trainings.approval.reject', 'uses' => 'TrainingController@reject'
            ]);

        Route::get('/trainings/approval/approve/{id}', [
            'as' => 'trainings.approval.approve', 'uses' => 'TrainingController@approve'
            ]);

        Route::get('/trainings/edit/{id}', [
            'as' => 'trainings.edit', 'uses' => 'TrainingController@viewEdit'
            ]);

        Route::post('/trainings/edit/post', [
            'as' => 'trainings.postEdit', 'uses' => 'TrainingController@update'
            ]);

        Route::get('/trainings/cancel/{id}', [
            'as' => 'trainings.cancel', 'uses' => 'TrainingController@cancel'
            ]);

        /* procurement */
        Route::get('/procurements/create', [
            'as' => 'procurements.create', function () {return view('pages.procurement.createProcurement');}
            ]);

        Route::post('/procurements/create', [
            'as' => 'procurements.postCreate', 'uses' => 'ProcurementsController@create'
            ]);

        Route::get('/procurements/list/current', [
            'as' => 'procurements.list.current', 'uses' => 'ProcurementsController@viewMyList'
            ]);

        Route::get('/procurements/details/{id}', [
            'as' => 'procurements.details', 'uses' => 'ProcurementsController@viewMyDetails'
            ]);

        Route::get('/procurements/list/all', [
            'as' => 'procurements.list.all', 'uses' => 'ProcurementsController@viewListof'
            ]);

        Route::get('/procurements/approval/{id}', [
            'as' => 'procurements.approval', 'uses' => 'ProcurementsController@viewDetails'
            ]);

        Route::get('/procurements/approval/reject/{id}', [
            'as' => 'procurements.approval.reject', 'uses' => 'ProcurementsController@reject'
            ]);

        Route::get('/procurements/approval/approve/{id}', [
            'as' => 'procurements.approval.approve', 'uses' => 'ProcurementsController@approve'
            ]);

        Route::get('/procurements/edit/{id}', [
            'as' => 'procurements.edit', 'uses' => 'ProcurementsController@viewEdit'
            ]);

        Route::post('/procurements/edit/post', [
            'as' => 'procurements.postEdit', 'uses' => 'ProcurementsController@update'
            ]);

        Route::get('/procurements/cancel/{id}', [
            'as' => 'procurements.cancel', 'uses' => 'ProcurementsController@cancel'
            ]);

        /* overtime */
        Route::get('/overtime/create', [
            'as' => 'overtime.create', 'uses' => 'OvertimeController@index'
            ]);

        Route::post('/overtime/create', [
            'as' => 'overtime.postCreate', 'uses' => 'OvertimeController@postOvertime'
            ]);

        Route::get('/overtime/list/current', [
            'as' => 'overtime.list.current', 'uses' => 'OvertimeController@showListOfMyOvertime'
            ]);

        Route::get('/overtime/details/{id}', [
            'as' => 'overtime.details', 'uses' => 'OvertimeController@showDetails'
            ]);

        Route::get('/overtime/list/all', [
            'as' => 'overtime.list.all', 'uses' => 'OvertimeController@showListOfOvertime'
            ]);

        Route::get('/overtime/approval/{id}', [
            'as' => 'overtime.approval', 'uses' => 'OvertimeController@showApproval'
            ]);

        Route::get('/overtime/approval/reject/{id}', [
            'as' => 'overtime.approval.reject', 'uses' => 'OvertimeController@reject'
            ]);

        Route::get('/overtime/approval/approve/{id}', [
            'as' => 'overtime.approval.approve', 'uses' => 'OvertimeController@approve'
            ]);

        Route::get('/overtime/edit/{id}', [
            'as' => 'overtime.edit', 'uses' => 'OvertimeController@viewEdit'
            ]);

        Route::post('/overtime/edit/post', [
            'as' => 'overtime.postEdit', 'uses' => 'OvertimeController@update'
            ]);

        Route::get('/overtime/cancel/{id}', [
            'as' => 'overtime.cancel', 'uses' => 'OvertimeController@cancel'
            ]);

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
        Route::get('/surveys/detail/{id}', [
            'as' => 'survey.detail', 'uses' => 'SurveysController@showDetail'
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
        Route::get('/surveyRecap',[
            'as' => 'survey.recap', 'uses' => 'SurveysController@showRecap'
            ]);

        /* feedback */
        Route::get('/feedbacks/create', [
            'as' => 'feedback.create', 'uses' => 'FeedbackController@index'
            ]);

        Route::post('/feedbacks/create', [
            'as' => 'feedback.postCreate', 'uses' => 'FeedbackController@postFeedback'
            ]);

        Route::get('/feedbacks', [
            'as' => 'feedback.list', 'uses' => 'FeedbackController@showListOfFeedback'
            ]);

        Route::get('/feedbacks/details/{id}', [
            'as' => 'feedback.details', 'uses' => 'FeedbackController@showDetail'
            ]);

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
