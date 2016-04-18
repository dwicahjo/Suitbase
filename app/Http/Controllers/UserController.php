<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Models\Department;
use App\Models\Division;
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
        return view('pages.user.createAccount',['divisions' => $divisions],['departments' => $departments]);
    }

    public function postCreate(Request $request){
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
            return redirect('/editProfile')
                        ->withErrors($validator);
        }

        return $this->createAccount($request->all());
    }

    protected function createAccount(array $data)
    {
        $user = User::create([
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
            'NPWP' => $data['NPWP'],
            'number_leave' => 12,
            'departments_id' => $data['departments_id'],
            'divisions_id' => $data['divisions_id'],
            /*'photo' => $data['photo'],*/
            'status' => 'Active',
            'type' => 'type',
        ]);

       /* if ($request->hasFile('CV'))
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

        $user->save();*/

        Session::flash('success', 'A new account was created successfully');
        return $this->index();
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
        $divisions = Division::all();
        $user = User::where('id', \Auth::user()->id)->get()->first();
        return view('pages.user.editProfile',['user' => $user],['divisions' => $divisions]);
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
            return redirect('/editProfile')
                        ->withErrors($validator);
        }

        $user = User::where('id', \Auth::user()->id)->get()->first();

        if ($request->password != "")
        {
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
        return back();
    }

    public function uploadImage (Request $request)
    {
        $messages = [
            'image.mimes' => "The file must be in PNG, JPG or JPEG format"
        ];

        $rules = [
            'image' => 'required|mimes:png,jpg,jpeg'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/editProfile')
                        ->withErrors($validator);
        }

        $user = User::where('id', \Auth::user()->id)->get()->first();

        $fileName = $user->name . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(base_path().'/public/upload/photos', $fileName);

        $user->photo = $fileName;
        $user->save();

        return back();
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
                $user->password = bcrypt($request->password);
                Session::flash('success', 'Password was reset successfully');
            }
        }

        $user->save();

        return back();
    }
}
