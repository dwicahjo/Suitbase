<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Models\Department;
use App\Models\Division;

class UserController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $divisions = Division::all();
        return view('pages.user.createAccount',['divisions' => $divisions],['departments' => $departments]);
    }

    public function postCreate(Request $request){
        return $this->createAccount($request->all());
    }

    protected function createAccount(array $data)
    {

     User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'gender' => $data['gender'],
        'religion' => $data['religion'],
        'address' => $data['address'],
        'birth_date' => $data['birth_date'],
        'birth_place' => $data['birth_place'],
        'phone' => $data['phone'],
        'ktp_id' => $data['ktp_id'],
        'ktp_address' => $data['ktp_address'],
        'KK' => $data['KK'],
        'CV' => $data['CV'],
        'NPWP' => $data['NPWP'],
        'KTP' => $data['KTP'],
        'ijazah' => $data['ijazah'],
        'departments_id' => $data['departments_id'],
        'divisions_id' => $data['divisions_id'],
        ]);
     return $this->index();
}

public function showListOfUser(){
    $users = User::orderBy('name','asc')->get();
    return view('pages.user.listOfUser',['users'=>$users]);
}

public function showDetail($id){

    $user = User::where('id',$id)->get();

    return view('pages.user.userDetails',['user'=>$user]);
}
}
