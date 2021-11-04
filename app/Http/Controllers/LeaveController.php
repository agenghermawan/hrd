<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Leave;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $items = Leave::with('user')->get();
            $totalleave = Leave::count();
            $waitingapproval = Leave::where('Approval','Waiting Approval')->count();
            // dd($items);
            return view('pages.leave.index')->with([
                'items'=> $items,
                'totalleave' => $totalleave,
                'waitingapproval' => $waitingapproval
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.leave.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $insert = Leave::create($data);


               if($insert){
             Alert::success('Success', 'Succesfully Request Leave');
        } 
        return redirect()->route('leave.index');
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
    public function edit($LeaveID)
    {
        $data = Leave::find($LeaveID);
        return view('pages.leave.edit')->with([
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $LeaveID)
    {

        if ($request -> Approval == 'Accept') {
           
             $data = Leave::findOrFail($LeaveID);
             $fdate =  $data -> Date_start;
             $tdate =  $data -> Date_end;

             $datetime1 = new DateTime($fdate);
             $datetime2 = new DateTime($tdate);

            
             $interval = $datetime1->diff($datetime2);
             $dayss = $interval->format('%d');

             $totalleavebefore = $data -> TotalLeave;

             $totalleaveafter = $totalleavebefore - (int)$dayss;


            $updatetotalleave = DB::table('leave')
            ->where('LeaveID',$LeaveID)
            ->update([
                'TotalLeave' => $totalleaveafter,
                'Approval' => $request -> Approval
            ]);

                 if($updatetotalleave){
                 Alert::success('Accepted', 'Succesfully Accept Leave  Employee');
        } 
               return redirect()->route('leave.index');
        }
        else{
             $updatetotalleave = DB::table('leave')
            ->where('LeaveID',$LeaveID)
            ->update([
                'Approval' => $request -> Approval
            ]);

                if($updatetotalleave){
                 Alert::info('Rejected', 'Rejected Leave Employee');
        } 

               return redirect()->route('leave.index');
        }

        return redirect()->route('leave.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = Leave::findOrFail($id);
       $delete=  $data->delete($data);
          if($delete){
             Alert::success('Success', 'Succesfully Delete Leave');
        } 
      
      return redirect()->route('leave.index');
    }
}
