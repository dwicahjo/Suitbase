<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends Controller
{
    public function index(){
        $users = DB::table('users')->get();
        return view('pages/users', compact('users'));
    }
}
