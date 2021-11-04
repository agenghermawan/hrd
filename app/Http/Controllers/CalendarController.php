<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    public function index(){
            $data = Leave::with('user')->where('Approval','Accept')->get();
             return view('pages.Calendar.index',compact('data'));
    }   

    public function getLeave(){
         $data = DB::table('leave')
            ->select(DB::raw('Date_start as start ,Date_end as end,users.EmployeeName title'))
            ->leftJoin('users', 'users.EmployeeID', '=', 'leave.EmployeeID')
            ->where('Approval','Accept')->get();
         return response()->json(['data' => $data]);
    }
}
