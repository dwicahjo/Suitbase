<?php

namespace App\Http\Controllers;

//require 'vendor/autoload.php';
use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Department;
use App\Models\Division;
use App\Models\Supervisor;
use App\Models\User;
use DB;
use Storage;
use Validator;
use Response;
use Session;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $departments = Department::all();
        $divisions = Division::all();
        $supervisors = User::where('type','Supervisor')->get();
        return view('pages.user.createAccount')->with(compact('departments','divisions','supervisors'));
    }

    public function postCreate(Request $request){
        $messages = [
            'CV.mimes' => "CV must be in PDF format",
            'KTP.mimes' => "KTP must be in PDF format",
            'ijazah.mimes' => "Ijazah must be in PDF format",
            'KK.mimes' => "Kartu Keluarga must be in PDF format",
            'password.same' => "Please repeat the password properly"
        ];

        $rules = [
            'name'              => 'required',
            'email'             => 'required|email',
            'password'          => 'required|same:password_confirmation',
            'gender'            => 'required',
            'religion'          => 'required',
            'address'           => 'required',
            'birth_date'        => 'required|date',
            'birth_place'       => 'required',
            'phone'             => 'required',
            'ktp_id'            => 'required',
            'ktp_address'       => 'required',
            'NPWP'              => 'required',
            'departments_id'    => 'required',
            'divisions_id'      => 'required',
            'type'              => 'required',
            'CV'                => 'mimes:pdf',
            'KTP'               => 'mimes:pdf',
            'ijazah'            => 'mimes:pdf',
            'KK'                => 'mimes:pdf',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('user.create')
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'religion' => $request->religion,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'birth_place' => $request->birth_place,
            'phone' => $request->phone,
            'ktp_id' => $request->ktp_id,
            'ktp_address' => $request->ktp_address,
            'NPWP' => $request->NPWP,
            'number_leave' => 12,
            'departments_id' => $request->departments_id,
            'divisions_id' => $request->divisions_id,
            'status' => 'Active',
            'photo' => 'photo.png',
            'type' => $request->type,
        ]);

        if ($request->hasFile('CV'))
        {
            $fileCV = 'CV_' . $user->name . '.' . $request->file('CV')->getClientOriginalExtension();
            $request->file('CV')->move(base_path().'/public/upload/docs', $fileCV);
            $user->CV = $fileCV;
        }

        if ($request->hasFile('KTP'))
        {
            $fileKTP = 'KTP_' . $user->name . '.' . $request->file('KTP')->getClientOriginalExtension();
            $request->file('KTP')->move(base_path().'/public/upload/docs', $fileKTP);
            $user->KTP = $fileKTP;
        }

        if ($request->hasFile('ijazah'))
        {
            $fileIjazah = 'Ijazah_' . $user->name . '.' . $request->file('ijazah')->getClientOriginalExtension();
            $request->file('ijazah')->move(base_path().'/public/upload/docs', $fileIjazah);
            $user->ijazah = $fileIjazah;
        }

        if ($request->hasFile('KK'))
        {
            $fileKK = 'KK_' . $user->name . '.' . $request->file('KK')->getClientOriginalExtension();
            $request->file('KK')->move(base_path().'/public/upload/docs', $fileKK);
            $user->KK = $fileKK;
        }

        $user->save();

        Supervisor::create([
            'supervisors_id' => $request->supervisor,
            'supervisees_id' => $user->id,
            //'gap_level' => '2',
        ]);

        Session::flash('success', 'A new account was created successfully');
        return redirect()->route('user.list');
    }

    public function showListOfUser(){
        /*$users = User::orderBy('name','asc')->get();*/
        $users = DB::table('users')
        ->join('divisions','users.divisions_id','=','divisions.id')
        ->select('users.*','divisions.name as division')
        ->get();
        return view('pages.user.listOfUser',['users'=>$users]);
    }

    public function showDetail($id){

        $user = User::where('id',$id)->get();

        return view('pages.user.userDetails',['user'=>$user]);
    }

    public function viewEdit()
    {
        $user = User::where('id', \Auth::user()->id)->get()->first();
        return view('pages.user.editProfile',['user' => $user]);
    }

    public function viewEditUser ($id)
    {
        $user = User::where('id', $id)->get()->first();
        return view('pages.user.editProfile',['user' => $user]);
    }

    public function update (Request $request)
    {
        $messages = [
            'CV.mimes' => "CV must be in PDF format",
            'KTP.mimes' => "KTP must be in PDF format",
            'ijazah.mimes' => "Ijazah must be in PDF format",
            'KK.mimes' => "Kartu Keluarga must be in PDF format"
        ];

        $rules = [
            'CV' => 'mimes:pdf',
            'KTP' => 'mimes:pdf',
            'ijazah' => 'mimes:pdf',
            'KK' => 'mimes:pdf'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator);
        }

        $user = User::where('id', $request->user_id)->get()->first();

        if ($request->password != "")
        {
            $messages = [
                'password.same' => "Please repeat the new password properly"
            ];

            $rules = [
                'password' => 'same:repeatPass'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator);
            }
            $user->password = bcrypt($request->password);
        }

        $user->name = $request->fullname;
        $user->birth_place = $request->birthplace;
        $user->birth_date = $request->birthdate;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->ktp_id = $request->ktpnumber;
        $user->ktp_address = $request->ktpAddress;
        $user->NPWP = $request->npwpnumber;
        $user->address = $request->currentAddress;
        $user->phone = $request->tlpnumber;

        if ($request->hasFile('CV'))
        {
            $fileCV = 'CV_' . $user->name . '.' . $request->file('CV')->getClientOriginalExtension();
            $request->file('CV')->move(base_path().'/public/upload/docs', $fileCV);
            $user->CV = $fileCV;
        }

        if ($request->hasFile('KTP'))
        {
            $fileKTP = 'KTP_' . $user->name . '.' . $request->file('KTP')->getClientOriginalExtension();
            $request->file('KTP')->move(base_path().'/public/upload/docs', $fileKTP);
            $user->KTP = $fileKTP;
        }

        if ($request->hasFile('ijazah'))
        {
            $fileIjazah = 'Ijazah_' . $user->name . '.' . $request->file('ijazah')->getClientOriginalExtension();
            $request->file('ijazah')->move(base_path().'/public/upload/docs', $fileIjazah);
            $user->ijazah = $fileIjazah;
        }

        if ($request->hasFile('KK'))
        {
            $fileKK = 'KK_' . $user->name . '.' . $request->file('KK')->getClientOriginalExtension();
            $request->file('KK')->move(base_path().'/public/upload/docs', $fileKK);
            $user->KK = $fileKK;
        }

        $user->save();

        Session::flash('success', 'Profile was edited successfully');
        return redirect()->back();
    }

    public function uploadImage (Request $request)
    {
        $messages = [
            'image.required' => "Choose the file first",
            'image.mimes' => "The file must be in PNG, JPG or JPEG format"
        ];

        $rules = [
            'image' => 'required|mimes:png,jpg,jpeg'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator);
        }

        $user = User::where('id', $request->user_id)->get()->first();

        $fileName = $user->name . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(base_path().'/public/upload/photos', $fileName);
        Image::make(base_path().'/public/upload/photos/'.$fileName)->fit(300, 300)->save();
        $user->photo = $fileName;
        $user->save();

        Session::flash('success', 'Profile photo was changed successfully');
        return redirect()->back();
    }

    public function download ($doc)
    {
        if ($doc == '1')
        {
            $file= public_path() . "/upload/docs/" . \Auth::user()->CV;
        }
        elseif ($doc == '2')
        {
            $file= public_path() . "/upload/docs/" . \Auth::user()->KTP;
        }
        elseif ($doc == '3')
        {
            $file= public_path() . "/upload/docs/" . \Auth::user()->ijazah;
        }
        elseif ($doc == '4')
        {
            $file= public_path() . "/upload/docs/" . \Auth::user()->KK;
        }

        return Response::download($file);
    }

    public function viewReset ($id)
    {
        $divisions = Division::all();
        $user = User::where('id', $id)->get()->first();

        // return View::make('pages.user.resetUser', compact($user, $divisions));
        return view('pages.user.resetUser',['user' => $user],['divisions' => $divisions]);
    }

    public function reset (Request $request)
    {
        $user = User::where('id', $request->user_id)->get()->first();

        if ($request->has('status'))
        {
            $user->status = $request->status;
            Session::flash('success', 'Account status was switched successfully');
        }
        else
        {
            $messages = [
                'newPassword.same' => "Please repeat the new password properly"
            ];

            $rules = [
                'newPassword' => 'same:repeatPassword'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect('/resetUser:' . $request->user_id)
                            ->withErrors($validator);
            }

            if ($user->divisions_id != $request->division || $user->type != $request->role)
            {
                $user->divisions_id = $request->division;
                $user->type = $request->role;
                Session::flash('success', 'User account was changed successfully');
            }

            if ($request->newPassword != "")
            {
                $user->password = bcrypt($request->newPassword);
                Session::flash('success', 'Password was reset successfully');
            }
        }

        $user->save();

        return redirect()->back();
    }
}
