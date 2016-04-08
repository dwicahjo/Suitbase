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
Route::get('/resetUser', function () {
    return view('pages.user.resetUser');
});


/*feedback*/
Route::get('/createFeedback', function () {
    return view('pages.feedback.createFeedback');
});

/* leave */
Route::get('/createLeave', function () {
    return view('pages.leave.create');
});

Route::get('/leaveDetails', function () {
    return view('pages.leave.viewdetails');
});

Route::get('/leaveApproval', function () {
    return view('pages.leave.leaveApproval');
});

Route::get('/myLeave', function () {
    return view('pages.leave.mylistofleave');
});

Route::get('/listOfLeave', function () {
    return view('pages.leave.alllistofleave');
});

Route::get('/editLeave', function () {
    return view('pages.leave.editleave');
});

/* remote */
Route::get('/createRemote', function () {
    return view('pages.remote.createRemote');
});

Route::get('/viewDetailsRemote', function () {
    return view('pages.remote.viewDetailsRemote');
});

Route::get('/remoteApproval', function () {
    return view('pages.remote.remoteApproval');
});

Route::get('/myListofRemote', function () {
    return view('pages.remote.myListofRemote');
});

Route::get('/allListOfRemote', function () {
    return view('pages.remote.allListofRemote');
});

Route::get('/editRemote', function () {
    return view('pages.remote.editRemote');
});

/* training */
Route::get('/createTraining', function () {
    return view('pages.training.createTraining');
});

Route::get('/viewDetailsTraining', function () {
    return view('pages.training.viewDetailsTraining');
});

Route::get('/trainingApproval', function () {
    return view('pages.training.trainingApproval');
});

Route::get('/myListofTraining', function () {
    return view('pages.training.myListofTraining');
});

Route::get('/allListOfTraining', function () {
    return view('pages.training.allListOfTraining');
});

Route::get('/editTraining', function () {
    return view('pages.training.editTraining');
});

/* procurement */
Route::get('/createProcurement', function () {
    return view('pages.procurement.create');
});

Route::get('/procurementDetails', function () {
    return view('pages.procurement.viewdetails');
});

Route::get('/procurementApproval', function () {
    return view('pages.procurement.procurementApproval');
});

Route::get('/myProcurement', function () {
    return view('pages.procurement.mylistofleave');
});

Route::get('/listOfProcurement', function () {
    return view('pages.procurement.alllistofleave');
});

Route::get('/editProcurement', function () {
    return view('pages.procurement.editleave');
});

/* overtime */
Route::get('/createOvertime', function () {
    return view('pages.overtime.create');
});

Route::get('/overtimeDetails', function () {
    return view('pages.overtime.viewdetails');
});

Route::get('/overtimeApproval', function () {
    return view('pages.overtime.overtimeApproval');
});

Route::get('/myOvertime', function () {
    return view('pages.overtime.mylistofovertime');
});

Route::get('/listOfOvertime', function () {
    return view('pages.overtime.alllistofovertime');
});

Route::get('/editOvertime', function () {
    return view('pages.overtime.editovertime');
});

/* survey */
Route::get('/createSurvey', function () {
    return view('pages.survey.createSurvey');
});

/* feedback */
Route::get('/createFeedback', 'FeedbackController@index');
Route::post('/createFeedback', 'FeedbackController@postFeedback');

/* appraisal */
Route::get('/viewListAppraisalTemplate', function () {
    return view('pages.survey.viewListAppraisalTemplate');
});

Route::get('/myAppraisal', function () {
    return view('pages.survey.myAppraisal');
});

Route::get('/allListofAppraisal', function () {
    return view('pages.survey.allListofAppraisal');
});

/* ini form aslinya guys*/
Route::get('/forms', function () {
    return view('pages.formsTemplate');
});

Route::get('/a', function () {
    return view('pages.panels-wells');
});

