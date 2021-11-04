<?php

namespace App\Http\Controllers;

use App\Models\DepartementModels;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totaluser = User::count();
        $Permanent = User::where('EmployeeType','Permanent')->count();
        $Contract = User::where('EmployeeType','Contract')->count();
        $Probation = User::where('EmployeeType','Probation')->count();


        $users = User::where('EmployeeName','!=','SuperAdmin')->get();
        return view('pages.user.index')->with([
            'users' => $users,
            'Permanent' => $Permanent,
            'Contract' => $Contract,
            'Probation' => $Probation,
            'totaluser' => $totaluser
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datadepartment = DepartementModels::all();
        return view('pages.user.create')->with([
            'datadepartment' => $datadepartment
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

       $data = User::create([
            'EmployeeName' => $request->EmployeeName,
            'EmployeeType' => $request->EmployeeType,
            'EmployeePosition' => $request->EmployeePosition,
            'Department' => $request->Department,
            'BirthDate' => $request->BirthDate, 
            'JoinDate' => $request->JoinDate,
            'email' => $request->email,
            'Phone' => $request->Phone,
            'Photo' => $request->file('Photo')->store('assets/images','public'),
            'Address' => $request->Address,
            'City' => $request->City,
            'TIN' => $request->TIN,
            'Country' => $request->Country,
            'Postal_Code' => $request->Postal_Code,
            'password' => Hash::make($request->password),
            'AboutMe' => $request->AboutMe,

        ]);
        
        if($data){
             Alert::success('Success', 'Succesfully Add New Employee');
        } 
   
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('pages.user.view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('pages.user.edit')->with([
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
    public function update(Request $request, $id)
    {

       $data = User::where('EmployeeID', $id)
            ->update([
            'EmployeeType' => $request->EmployeeType,
            'EmployeePosition' => $request->EmployeePosition,
            'Department' => $request->Department,
            'BirthDate' => $request->BirthDate,
            'JoinDate' => $request->JoinDate,
            'email' => $request->email,
            'Phone' => $request->Phone,
            'TIN' => $request->TIN,
            'Address' => $request->Address,
            'City' => $request->City,
            'Country' => $request->Country,
            'Postal_Code' => $request->Postal_Code,
            // 'password' => Hash::make($request->password),
            'AboutMe' => $request->AboutMe,
        
      ]);
    
        
        if ($request->file('Photo') == null) {
         $file = "";
            }
            else
            {
            $data['Photo'] = $request->file('Photo')->store(
           'assets/images','public');
           }


              if($data){
                 Alert::success('Success', 'Succesfully Update Employee');
            } 

            return redirect()->route('employee.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
       $delete =  $data->delete($data);

          if($delete){
             Alert::success('Success', 'Succesfully Delete Employee');
        } 
        return redirect()->route('employee.index');
    }

    public function search(Request $request)
    {
        $search = $request->search;


        $users = User::where('EmployeeName','like',"%".$search."%")->get();
        return view('pages.user.index')->with([
            'users' => $users
        ]);
    }
        public function change(Request $request,$id)
    {
        return view('pages.user.changepassword');
    }
}
