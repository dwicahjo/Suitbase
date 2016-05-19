<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\RecapRequest;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            if(Auth::user()->type == 'HR') {
                return $this->getChartData();
            }
            else{
                return view('home');   
            }
        } 
        else {
            return view('auth.login');
        }
    }

    public function getChartData (){
        $totalLeaves = RecapRequest::select('department', 'total_leaves')->get();
        $totalRemotes = RecapRequest::select('department', 'total_remotes')->get();
        $totalTrainings = RecapRequest::select('department', 'total_trainings')->get();
        $totalProcurements = RecapRequest::select('department', 'total_procurements')->get();

        $leaveLabels = [];
        $leaveDatas = [];
        $remoteLabels = [];
        $remoteDatas = [];
        $trainingLabels = [];
        $trainingDatas = [];
        $procurementLabels = [];
        $procurementDatas = [];

        foreach ($totalLeaves as $total ) {
            array_push($leaveLabels, $total->department);
            array_push($leaveDatas, $total->total_leaves);
        }

        foreach ($totalRemotes as $total) {
            array_push($remoteLabels, $total->department);
            array_push($remoteDatas, $total->total_remotes);
        }

        foreach ($totalTrainings as $total) {
            array_push($trainingLabels, $total->department);
            array_push($trainingDatas, $total->total_trainings);
        }

        foreach ($totalProcurements as $total) {
            array_push($procurementLabels, $total->department);
            array_push($procurementDatas, $total->total_procurements);
        }

        return view('dashboard', compact([
            'leaveLabels','leaveDatas','remoteLabels','remoteDatas','trainingLabels','trainingDatas','procurementLabels','procurementDatas'
            ]));
    }
}
