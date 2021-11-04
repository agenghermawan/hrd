<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Attendance;
use App\Models\User;
use App\Models\Task;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Date;
use RealRashid\SweetAlert\Facades\Alert;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $user = Auth::user()->EmployeeID;
        $roles = Auth::user()->EmployeePosition;


        if ($roles == 'HR') {
            $attendance = Attendance::with('user')->get();
                    return view('pages.attendance.index')->with([
                            'attendance' => $attendance,
                    ]); 
        } elseif ($roles == 'Supervisor') {

           $attendance = Attendance::with(['user'])
                        ->whereHas('user', function($q){
                        $q->where('EmployeePosition', '=', 'Supervisor'); 
                        $q->orWhere('EmployeePosition', '=', 'Employee'); 
                        })->get();

                    return view('pages.attendance.index')->with([
                            'attendance' => $attendance,
                    ]); 

        } else {
            $attendance = Attendance::where('EmployeeID',$user)->get();
                  return view('pages.attendance.index')->with([
                        'attendance' => $attendance,
                    ]); 
        }

        


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $user = Auth::user()->EmployeeID;

      

                $attendance = DB::table('Attendances')
                    ->where('EmployeeID' , '=' , $user)
                    ->whereDate('Check_In', '=',  Carbon::today())
                    ->first();

            if(!is_null($attendance)){
                           $task = DB::table('Tasks')
                            ->where('AttendanceID','=',$attendance->AttendanceID)
                            ->get();

                              return view('pages.attendance.create_attendance')->with([
                            'attendance' => $attendance,
                            'task' => $task
             ]);

            }

            //      $checkin = DB::table('Attendances')
            //         ->where('EmployeeID' , '=' , $user)
            //         ->whereDate('Check_In', '=',  Carbon::today())
            //         ->first();


            //    $datecheckout = DB::table('Tasks')
            //                 ->where('AttendanceID','=',$checkin->AttendanceID)
            //                 ->get();
                            
                        // dd($take);
            return view('pages.attendance.create_attendance')->with([
            'attendance' => $attendance,
           
             ]);

             
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dump($request);

        // dd($request->attendanceDetail);
        $user = Auth::user()->EmployeeID;
        
        //menselect user apakah sudah checkin atau belum

                 $checkin = DB::table('Attendances')
                    ->where('EmployeeID' , '=' , $user)
                    ->whereDate('Check_In', '=',  Carbon::today())
                    ->first();

          
        if(is_null($checkin)){
             $insertcheckin = DB::table('attendances')->insert([
            'EmployeeID' => $request->EmployeeID,
            'WorkType' => $request->WorkType,
            'Notes' => $request->Notes,
            'Address_CheckIn' => $request->Address,
            'Latitude_CheckIn' => $request->Latitude,
            'Longitude_CheckIn' => $request->Longitude,
        ]);

           $checkin = DB::table('Attendances')
                    ->where('EmployeeID' , '=' , $user)
                    ->whereDate('Check_In', '=',  Carbon::today())
                    ->first();

             foreach($request->attendanceDetail as $detail){
                     $taskchecin = DB::table('Tasks')->insert([
                        'EmployeeID' => $user,
                        'AttendanceID' =>$checkin->AttendanceID,
                        'TaskName' => $detail['TaskName'],
                        'Duration' => $detail['Duration'],
                    ]);
                }
             Alert::success('Success', 'Succesfully Daily Check-In');
        }
        else
        {

                    $user = Auth::user()->EmployeeID;
                
                    $checkin = DB::table('Attendances')
                    ->where('EmployeeID' , '=' , $user)
                    ->whereDate('Check_In', '=',  Carbon::today())
                    ->first();

                    // dd($checkin);

                    $data = DB::table('tasks')
                    ->where('AttendanceID' , '=' , $checkin->AttendanceID)
                    ->get();

                    $data= Task::where('AttendanceID', $checkin->AttendanceID)->where('EmployeeID',$checkin->EmployeeID)->get()->each->delete();

                if($request->attendanceDetailCheckout != null)
                {
                    foreach($request->attendanceDetailCheckout as $detail){
                                $taskchecin = DB::table('Tasks')->insert([
                                    'EmployeeID' => $user,
                                    'AttendanceID' =>$checkin->AttendanceID,
                                    'TaskName' => $detail['TaskName'],
                                    'Duration' => $detail['Duration'],
                                    'Status' => $detail['Status'],
                    ]);
                }   

                }
     

                    if ($request->attendanceDetailCheckoutAddit != null) {
                        foreach($request->attendanceDetailCheckoutAddit as $detail){
                        $taskchecin = DB::table('Tasks')->insert([
                        'EmployeeID' => $user,
                        'AttendanceID' =>$checkin->AttendanceID,
                        'TaskName' => $detail['TaskName'],
                        'Duration' => $detail['Duration'],
                        'Status' => $detail['Status'],
                    ]);
                }
              
                    }
      

            $updatecheckout = DB::table('attendances')
            ->whereDate('Check_In' , Carbon::today())
            ->update([
                'Check_Out' => Carbon::now(),
                'Address_CheckOut' => $request-> Address,
                'Latitude_CheckOut' => $request->Latitude,
                'Longitude_CheckOut' => $request->Longitude,
            ]);

             Alert::success('Success', 'Succesfully Daily Check-Out');
 
        }

                            $attendance = Attendance::whereDate('Check_In',Carbon::today())
                            ->where('EmployeeID',$user)
                            ->first();

                            $task = DB::table('Tasks')
                            ->where('AttendanceID','=',$attendance->AttendanceID)
                            ->get();

                            // dd($attendance);
        
                            return view('pages.attendance.create_attendance')->with([
                            'attendance' => $attendance,
                            'task' => $task,
                            ]);


                //  $user = Auth::user()->EmployeeID;
                //  $address = $request->Address;

                //  $checkout = DB::table('Attendances')
                //     ->where('EmployeeID' , '=' , $user)
                //     ->whereDate('Check_In', '=',  Carbon::today())
                //     ->first();

                //     if(is_null($checkout)){
                //         $data =  $request -> all();
                //         $insert = Attendance::create($data);
                //     }else{
                //         $checkout =  Attendance::where('EmployeeID', $user)
                //         ->whereDate('Check_In',Carbon::today())
                //         ->update(
                //             [
                //                 'Check_Out' => Carbon::now(),
                //                 'CheckOut_Address' => $address,
                //             ]
                //         );
                //     }

                            // $take = Attendance::whereDate('Check_In',Carbon::today())
                            // ->where('EmployeeID',$user)
                            // ->first();

                            // return view('pages.attendance.create_attendance')->with([
                            // 'take' => $take
                            // ]);

                     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($AttendanceID)
    {
                 $user = Auth::user()->EmployeeID;

                 $take = Attendance::where('AttendanceID',$AttendanceID)->first();

                 $takeuser = User::where('EmployeeID',$take->EmployeeID)->first();

                 $taskdetail = DB::table('tasks')->where('AttendanceID',$AttendanceID)->get();

                return view('pages.attendance.detail')->with([
                    'take' => $take,
                    'takeuser' => $takeuser,
                    'taskdetail' => $taskdetail
                ]);
                        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($AttendanceID)
    {
    // $dd($id);
    //   $user = Attendance::find(1);
    //   $user -> update(['Check_Out' => now()]);
         $updatecheckout = DB::table('Attendances')->where('AttendanceID', $AttendanceID)->update(['Check_Out' => Carbon::now()]); 

         dd($updatecheckout);

        // Attendance::where('id', $id)->update(array('Check_Out' => Carbon::now()));
        return redirect()->route('attendance.index');
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
    //     // $dd($id);
    // //   $user = Attendance::find(1);
    // //   $user -> update(['Check_Out' => now()]);
    //      $updatecheckout =    DB::table('Attendances')->where('id', $id)->update(['Check_Out' => Carbon::now()]); 

    //      dd($updatecheckout);

    //     // Attendance::where('id', $id)->update(array('Check_Out' => Carbon::now()));
    //     return redirect()->route('attendance.index');
    

       // $data = $request->all();
        
        // $insert = Attendance::create($data);
        // return redirect()->route('attendance.index');

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
    
    public function search(Request $request)
    {

         $user = Auth::user()->EmployeeID;
         $roles = Auth::user()->EmployeePosition;
         $date = Carbon::today()->toDateString();

         
        $df =  $request -> DateFrom;
        $dt =   $request -> DateTo;

        if ($roles == 'HR') {
                $date = Carbon::today()->toDateString();
                        $attendance = Attendance::whereBetween('Check_In',[$df, $dt])->get();
                         return view('pages.attendance.index')->with([
                          'attendance' => $attendance,
                           ]); 
        } elseif ($roles == 'Supervisor') {
                        $attendance = Attendance::with(['user'])
                        ->whereBetween('Check_In',[$df, $dt])
                        ->whereHas('user', function($q){
                        $q->where('EmployeePosition', '=', 'Supervisor'); 
                        $q->orWhere('EmployeePosition', '=', 'Employee'); 
                        })->get();

                    return view('pages.attendance.index')->with([
                            'attendance' => $attendance,
                    ]); 

        } else {
            $attendance = Attendance::where('EmployeeID',$user)->whereBetween('Check_In',[$df, $dt])->get();
                  return view('pages.attendance.index')->with([
                        'attendance' => $attendance,
                    ]); 
        }
    }

}
