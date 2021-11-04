<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartementModels;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;



class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $totaldeparment = DepartementModels::count();
        $totaldeparmentactive = DepartementModels::where('Status','Active')->count();


        // $data = DepartementModels::all();
        // return view('pages.departement.index')->with([
        //     'data' => $data,
        // ]);

        $department = DB::table('department')->paginate(5);
    		// mengirim data pegawai ke view index
	       return view('pages.departement.index')->with([
            'department' => $department,
            'totaldeparment' => $totaldeparment,
            'totaldeparmentactive' => $totaldeparmentactive
        ]);

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.departement.create');
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
        $insert = DepartementModels::create($data);

      if($insert){
        Alert::success('Success', 'Succesfully Add new Department');
        
      }
        return redirect()->route('departement.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DepartementModels::FindOrFail($id);
        return view('pages.departement.view',compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DepartementModels::findOrFail($id);
        return view('pages.departement.edit')->with([
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
        $item = $request -> all();
        $data = DepartementModels::findOrFail($id);

       $update =  $data->update($item);

        if($update){
        Alert::success('Success', 'Succesfully Update Data Department');
        
      } 
        return redirect()->route('departement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DepartementModels::findOrFail($id);
      $delete =   $data->delete($data);

             if($delete){
        Alert::success('Success', 'Succesfully Delete Data Department');
        
      } 
        
        return redirect()->route('departement.index');

    }

        public function search(Request $request)
    {
        $search = $request->search;

        $department = DB::table('department')
        	->where('Department_Name','like',"%".$search."%")
        ->paginate(5);



        return view('pages.departement.index')->with([
            'department' => $department
        ]);
    }
}
