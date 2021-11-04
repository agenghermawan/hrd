<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Salary::with('user')->get();

        return view('pages.salary.index')->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = User::all();
        return view('pages.salary.create')->with([
            'items' => $items
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

        $total = $request->GajiPokok + $request->Tunjangan;
        $tax = $total * 2/100;
        $all = $total - $tax;
            $insert = DB::table('salary')->insert([
                'EmployeeID' => $request->EmployeeID,
                'GajiPokok' => $request->GajiPokok,
                'Tunjangan' => $request->Tunjangan,
                'Bank' => $request->Bank,
                'NoAccount' => $request->NoAccount,
                'Total' => $all,
            ]);
            

             Alert::success('Success', 'Succesfully Create Data Salary');
            return redirect()->route('salary.index');
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
        $data = Salary::with('user')->where('SalaryID',$id)->first();
        $item = Salary::findOrFail($id);
        return view('pages.salary.edit',compact('item','data'));
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
        $data = Salary::findOrFail($id);
        $item = $request -> all();

        $update = $data -> update($item);

         if($update){
             Alert::success('Success', 'Succesfully Update Data Salary');
        } 
        return redirect()->route('salary.index');
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
