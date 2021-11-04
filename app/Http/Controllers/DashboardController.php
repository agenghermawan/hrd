<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Aset;
use App\Models\Attendance;
use App\Models\User;
use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\DepartementModels;
use App\Models\Leave;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       
               $user = Auth::user()->EmployeeID;
                $leave = Leave::where('EmployeeID',$user)->first();
                 $checkin = DB::table('Attendances')
                    ->where('EmployeeID' , '=' , $user)
                    ->whereDate('Check_In', '=',  Carbon::today())
                    ->first();

            //   $dtcin =  $checkin->Check_in;
            //   $dtcout = $checkin->Check_Out;

            //   $dtcin->toTimeString();
            //   $dtcout->toTimeString();

        $pie = [
            'permanent' => User::where('EmployeeType','Permanent')->count(),
            'contract' => User::where('EmployeeType','Contract')->count(),
            'probation' => User::where('EmployeeType','Probation')->count()
        ]; 
                

        $mytime = Carbon::now();
        $day = Carbon::now()->format('l');


    $greetings = "";
    $time = date("H");
    $timezone = date("e");
    if ($time < "12") {
        $greetings = "Good morning";
    } else
    if ($time >= "12" && $time < "17") {
        $greetings = "Good afternoon";
    } else
    if ($time >= "17" && $time < "19") {
        $greetings = "Good evening";
    } else
    if ($time >= "19") {
        $greetings = "Good night";
    }
        $totalproject = project::count();
        $totaldeparment = DepartementModels::count();
        $totaluser = User::count();
        $totalaset = Aset::count();
        $department = DepartementModels::orderBy('id','DESC')->take(5)->get();
        $project = project::orderBy('id','DESC')->take(5)->get();

        return view('pages.dashboard.index')->with([
            'totalproject' => $totalproject,
            'totaldeparment' => $totaldeparment,
            'totaluser' => $totaluser,
            'totalaset' => $totalaset,
            'department' => $department,
            'project' => $project,
            'greetings' =>  $greetings,
            'mytime' => $mytime,
            'day' => $day,
            'checkin' => $checkin,
            'pie' => $pie,
            'leave' => $leave
            // 'dtcin' => $dtcin,
            // 'dtcout' => $dtcout
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
