<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Models\Employee;

class EmployeesController extends Controller
{
    public function addEmployee (Request $request)
    {
    	$employee = new Employee;

    	$employee->email = $request->email;
    	$employee->password = $request->password;
    	$employee->type = $request->role;
    	$employee->name = $request->fullname;
    	$employee->birth_place = $request->birthplace;
    	$employee->birth_date = $request->birthdate;
    	$employee->gender = $request->gender;
    	$employee->religion = $request->religion;
    	$employee->ktp_id = $request->ktpnumber;
    	$employee->NPWP = $request->npwpnumber;
    	$employee->ktp_address = $request->ktpaddress;
    	$employee->address = $request->currentaddress;
    	$employee->phone = $request->tlpnumber;
    	$employee->CV = "abc";
        $employee->KK = "abc";
        $employee->ijazah = "abc";
        $employee->overtime_hours = 0;
        $employee->number_leave = 12;
        $employee->last_avg_score = 0;
        $employee->departments_id = 1;
        $employee->divisions_id = 1;

    	$employee->save();

    	return back();
    }

    public function viewListOf()
    {
    	// $employees = DB::table('employees')->paginate(15);
    	$employees = Employee::paginate(15);

    	return view('pages.user.listOfUser', ['employees' => $employees]);
    }
}
