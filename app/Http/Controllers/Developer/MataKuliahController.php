<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $dosen = User::all();
            $matakuliah = MataKuliah::all();
            $data['title'] = 'Manajemen Kelas';
            $data['desc'] = 'Fitur Untuk Membuat Kelas';
            return view('developer.matakuliah.index',$data ,compact('matakuliah','dosen'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            $data['title'] = 'Manajemen Mata Kuliah';
            $data['desc'] = 'Fitur Untuk Membuat Mata Kuliah';
            $dosen = User::all();
            // $dosen = DB::table('users')->where('jabatan', 'Dosen')->first();
            return view('developer.matakuliah.create',$data ,compact('dosen'));
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
        $matakuliah = new matakuliah();
        $matakuliah->dosen_id = $request->dosen_id;
        $matakuliah->nama_matakuliah = $request->nama_matakuliah;
        $matakuliah->kode_matakuliah = $request->kode_matakuliah;
        $matakuliah->jumlah_sks = $request->jumlah_sks;
        $matakuliah->save();

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
        $matakuliah = MataKuliah::findOrFail($id);
        $matakuliah->delete();
        
        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }
}
