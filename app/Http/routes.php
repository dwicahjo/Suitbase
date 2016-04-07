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

/*sementara aja kok*/
Route::get('/', function () {
    return view('layoutTemplate');
});

Route::get('about', function () {
    return view('pages.about');
});

Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/logout', function () {
    return view('pages.login1');
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
    return view('pages.remote.create');
});

Route::get('/remoteDetails', function () {
    return view('pages.remote.viewdetails');
});

Route::get('/remoteApproval', function () {
    return view('pages.remote.remoteApproval');
});

Route::get('/myListOfRemote', function () {
    return view('pages.remote.mylistofleave');
});

Route::get('/allListOfRemote', function () {
    return view('pages.remote.alllistofleave');
});

Route::get('/editRemote', function () {
    return view('pages.remote.editleave');
}); 

/* training */
Route::get('/createTraining', function () {
    return view('pages.training.create');
});

Route::get('/trainingDetails', function () {
    return view('pages.training.viewdetails');
});

Route::get('/trainingApproval', function () {
    return view('pages.training.trainingApproval');
});

Route::get('/myListOfTraining', function () {
    return view('pages.training.mylistofleave');
});

Route::get('/allListOfTraining', function () {
    return view('pages.training.alllistofleave');
});

Route::get('/editTraining', function () {
    return view('pages.training.editleave');
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

Route::get('/myListOfProcurement', function () {
    return view('pages.procurement.mylistofleave');
});

Route::get('/allListOfProcurement', function () {
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

Route::get('/myListOfOvertime', function () {
    return view('pages.overtime.mylistofovertime');
});

Route::get('/allListOfOvertime', function () {
    return view('pages.overtime.alllistofovertime');
});

Route::get('/editOvertime', function () {
    return view('pages.overtime.editovertime');
}); 

/* survey */
Route::get('/createSurvey', function () {
    return view('pages.survey.createSurvey');
}); 

/* ini form aslinya guys*/
Route::get('/forms', function () {
    return view('pages.formsTemplate');
});

Route::get('/a', function () {
    return view('pages.panels-wells');
});

