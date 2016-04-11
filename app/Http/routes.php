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
Route::get('/createAccount', function () {
    return view('pages.user.createAccount');
});
Route::get('/editProfile', function () {
    return view('pages.user.editProfile');
});
Route::get('/listOfUser', function () {
    return view('pages.user.listOfUser');
});
Route::get('/myProfile', function () {
    return view('pages.user.myProfile');
});
Route::get('/userDetails', function () {
    return view('pages.user.userDetails');
});
Route::get('/resetUser', function () {
    return view('pages.user.resetUser');
});

/* leave */
Route::get('/createLeave', function () {
    return view('pages.leave.createLeave');
});

Route::post('/storeLeave', 'LeavesController@create');

Route::get('/leaveDetails', function () {
    return view('pages.leave.leaveDetails');
});
Route::get('/leaveApproval', function () {
    return view('pages.leave.leaveApproval');
});
Route::get('/myLeave', function () {
    return view('pages.leave.myLeave');
});

Route::get('/listOfLeave', 'LeavesController@viewListof');

Route::get('/editLeave', function () {
    return view('pages.leave.editLeave');
});

Route::get('/leaves/{{ $leaves->id }}', 'LeavesController@viewListof');

/* remote */
Route::get('/createRemote', function () {
    return view('pages.remote.createRemote');
});
Route::get('/remoteDetails', function () {
    return view('pages.remote.remoteDetails');
});
Route::get('/remoteApproval', function () {
    return view('pages.remote.remoteApproval');
});
Route::get('/myRemote', function () {
    return view('pages.remote.myRemote');
});
Route::get('/listOfRemote', function () {
    return view('pages.remote.listOfRemote');
});
Route::get('/editRemote', function () {
    return view('pages.remote.editRemote');
});

/* training */
Route::get('/createTraining', function () {
    return view('pages.training.createTraining');
});
Route::get('/trainingDetails', function () {
    return view('pages.training.trainingDetails');
});
Route::get('/trainingApproval', function () {
    return view('pages.training.trainingApproval');
});
Route::get('/myTraining', function () {
    return view('pages.training.myTraining');
});
Route::get('/listOfTraining', function () {
    return view('pages.training.listOfTraining');
});
Route::get('/editTraining', function () {
    return view('pages.training.editTraining');
});

/* procurement */
Route::get('/createProcurement', function () {
    return view('pages.procurement.createProcurement');
});
Route::get('/procurementDetails', function () {
    return view('pages.procurement.procurementDetails');
});
Route::get('/procurementApproval', function () {
    return view('pages.procurement.procurementApproval');
});
Route::get('/myProcurement', function () {
    return view('pages.procurement.myProcurement');
});
Route::get('/listOfProcurement', function () {
    return view('pages.procurement.listOfProcurement');
});
Route::get('/editProcurement', function () {
    return view('pages.procurement.editProcurement');
});

/* overtime */
Route::get('/createOvertime', function () {
    return view('pages.overtime.createOvertime');
});
Route::get('/overtimeDetails', function () {
    return view('pages.overtime.overtimeDetails');
});
Route::get('/overtimeApproval', function () {
    return view('pages.overtime.overtimeApproval');
});
Route::get('/myOvertime', function () {
    return view('pages.overtime.myOvertime');
});
Route::get('/listOfOvertime', function () {
    return view('pages.overtime.listOfOvertime');
});
Route::get('/editOvertime', function () {
    return view('pages.overtime.editOvertime');
});

/* survey */
Route::get('/createSurvey', function () {
    return view('pages.survey.createSurvey');
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

/* ini form aslinya guys*/
Route::get('/forms', function () {
    return view('pages.formsTemplate');
});
Route::get('/a', function () {
    return view('pages.panels-wells');
});