<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\RecapRequest;
use App\Models\Department;
use DB;

class RequestsController extends Controller
{
    public function index ()
    {
    	$recap = RecapRequest::all();
    	$departments = Department::all();

    	return view('pages.recapRequest', compact('recap'));
    }
}
