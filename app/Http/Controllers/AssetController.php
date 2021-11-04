<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Aset::all();

        return view('pages.aset.index')->with([
            'data' => $data ,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.aset.create');
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
        $data['PhotoAsset'] = $request->file('PhotoAsset')->store(
           'assets/imagesAsset','public'
        );

        $insert  = Aset::create($data);
               
        if($insert){
             Alert::success('Success', 'Succesfully Add New Asset');
        } 
        return redirect()->route('asset.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Aset::findOrFail($id);
        return view('pages.aset.view')->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Aset::findOrFail($id);
        return view('pages.aset.edit')->with([
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
         public function getPhotoAssetAttribute($value)
    {
        return url('storage/'. $value);
    }

    
    public function update(Request $request, $id)
    {
    
            if ($request->file('PhotoAsset') == null) {
                $data = Aset::where('id', $id)
                ->update([
                'AssetName' => $request->AssetName,
                'SerialNo' => $request->SerialNo,
                'Year' => $request->Year,
                'condition' => $request->condition,
                'Date' => $request->Date,
                'Price' => $request->Price,
                'Information' => $request->Information,
                 ]);
            }else{
                $data = Aset::where('id', $id)
                ->update([
                'AssetName' => $request->AssetName,
                'SerialNo' => $request->SerialNo,
                'Year' => $request->Year,
                'condition' => $request->condition,
                'PhotoAsset' => $request->file('PhotoAsset')->store('assets/imagesAsset','public'),
                'Date' => $request->Date,
                'Price' => $request->Price,
                'Information' => $request->Information,
                 ]);
            }
            
        Alert::success('Success', 'Succesfully Update Asset');
        return redirect()->route('asset.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Aset::findOrFail($id);
        $data -> delete($data);
        return view('pages.aset.index');
    }
}
