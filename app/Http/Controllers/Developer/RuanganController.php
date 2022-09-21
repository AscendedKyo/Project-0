<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruangan;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangan = Ruangan::all();
        $data['title'] = 'Manajemen Ruangan';
        $data['desc'] = 'Fitur Untuk Menampilkan Ruangan';
        return view('developer.ruangan.index',$data ,compact('ruangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruangan = Ruangan::all();
        $data['title'] = 'Manajemen Ruangan';
        $data['desc'] = 'Fitur Untuk Menambahkan Ruangan';
        return view('developer.ruangan.create',$data ,compact('ruangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ruangan = new Ruangan();
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->kode_ruangan = $request->kode_ruangan;
        $ruangan->lokasi_ruangan = $request->lokasi_ruangan;
        $ruangan->is_active = $request->is_active;
        $ruangan->save();

        return redirect()->back()->with('success','Data added successfully');
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
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->delete();
        
        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }
}
