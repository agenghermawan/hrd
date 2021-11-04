<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\User;
use App\Models\DepartementModels;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $item = project::with('user')->get();
            $data = DB::table('projects')->get();
            $user = DB::table('users')->get();
            $departement = DB::table('department')->get();
            $totalproject = Project::count();
            $onprogress = Project::where('Status','On Progress')->count();
            $done = Project::where('Status','Done')->count();
 
            
            return view('pages.project.listproject')->with([
                'data' => $data,
                'user' => $user,
                'departement' => $departement,
                'item' => $item,
                'totalproject' => $totalproject,
                'onprogress' => $onprogress,
                'done' => $done,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $user = DB::table('users')->get();
            $departement = DB::table('department')->get();
            return view('pages.project.createproject')->with([
            'user' => $user,
            'departement' => $departement
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
        $data = $request -> all();
        $developer = $data['DeveloperName'];
        $data['DeveloperName'] = implode(',', $developer);       
        $insert = project::create($data);

        
        if($insert){
             Alert::success('Success', 'Succesfully Add New Project');
        } 
        return redirect()->route('project.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = project::findOrfail($id);
        return view('pages.project.view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = project::findOrFail($id);
        $user = DB::table('users')->get();
        $departement = DB::table('department')->get();
                    
        return view('pages.project.edit')->with([
                 'user' => $user,
                  'departement' => $departement,    
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
        $data = project::findOrFail($id);
        $update =   $data -> update($item);

        if($update){
             Alert::success('Success', 'Succesfully Edit Data Project');
        }

        return redirect()->route('project.index');
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

    public function list(){
        return view('pages.project.listproject');
    }
}
