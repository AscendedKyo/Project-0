<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = User::all();
        $data['title'] = 'Manajemen Karyawan';
        return view('developer.karyawan.index',$data ,compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            $data['title'] = 'Add Category';
            $data['desc'] = 'Add category in here';
            return view('developer.karyawan.create',$data);
        }
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $karyawan = new User();
        $karyawan->name = $request->name;
        $karyawan->nik = $request->nik;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->nomor_telepon = $request->nomor_telepon;
        $karyawan->jenis_kelamin = $request->jenis_kelamin;
        $karyawan->agama = $request->agama;
        $karyawan->tempat_tinggal = $request->tempat_tinggal;
        $karyawan->tanggal_lahir = $request->tanggal_lahir;
        $karyawan->save();

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
        $karyawan = User::findOrFail($id);
        $karyawan->delete();
        
        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }
}
