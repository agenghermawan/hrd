<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Salary;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;


class PaymentController extends Controller
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

        $totalpayment = Payment::count();
        


        if ($roles == 'HR') {
            $items = Payment::with('user','salary')->get();
                    return view('pages.payment.index')->with([
                            'items' => $items,
                    ]); 
        } elseif ($roles == 'Supervisor') {

           $items = Payment::with(['user'])
                        ->whereHas('user', function($q){
                        $q->where('EmployeePosition', '=', 'Supervisor'); 
                        $q->orWhere('EmployeePosition', '=', 'Employee'); 
                        })->get();

                    return view('pages.payment.index')->with([
                            'items' => $items,
                    ]); 

        } else {
            $items = Payment::with('user','salary')->where('EmployeeID',$user)->get();
                  return view('pages.payment.index')->with([
                        'items' => $items,
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
        $items = Salary::with('user')->get();
        $user = User::all();
        return view('pages.payment.create')->with([
            'items' => $items,
            'user' => $user
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
        $item = $request -> all();
        $insert = Payment::create($item);

        
        if ($insert) {
         Alert::success('Success', 'Succesfully Create  Data Payment');
        }
        return redirect()->route('payment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Payment::with('user','salary')->where('PaymentID',$id)->first();
        return view('pages.payment.view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Payment::with('user')->where('PaymentID',$id)->first();
        $data = Payment::findOrFail($id);
        return view('pages.payment.edit',compact('data','item'));
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
        $data= $request->all();
        $item = Payment::findOrFail($id);
        $update =  $item -> update($data);

        if ($update) {
         Alert::success('Success', 'Succesfully Create Update Data Payment');
        }
        return redirect()->route('payment.index');
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

    public function getEmployees($id){
         $data = Salary::with('user')->where('EmployeeID',$id)->get();
         //$data = User::where('EmployeeID',$id)->get();
         return response()->json(['data' => $data]);
    }

    public function print($id){
        $data['data'] = Payment::with('user','salary')->where('PaymentID',$id)->first();
        return view('pages.payment.print',$data);
        // $pdf = \PDF::loadView('pages.payment.print', $data);
        // return $pdf->download('slip.salary.pdf');
    }

    //    public function search(Request $request)
    // {

    //     $user = Auth::user()->EmployeeID;
    //     $roles = Auth::user()->EmployeePosition;

        

    //     if ($roles == 'HR') {
    //         $items = Payment::with('user','salary')->get();
    //                 return view('pages.payment.index')->with([
    //                         'items' => $items,
    //                 ]); 
    //     } elseif ($roles == 'Supervisor') {

    //        $items = Payment::with(['user'])
    //                     ->whereHas('user', function($q){
    //                     $q->where('EmployeePosition', '=', 'Supervisor'); 
    //                     $q->orWhere('EmployeePosition', '=', 'Employee'); 
    //                     })->get();

    //                 return view('pages.payment.index')->with([
    //                         'items' => $items,
    //                 ]); 

    //     } else {
    //         $items = Payment::with('user','salary')->where('EmployeeID',$user)->get();
    //               return view('pages.payment.index')->with([
    //                     'items' => $items,
    //                 ]); 
    //     }
    // }
}
