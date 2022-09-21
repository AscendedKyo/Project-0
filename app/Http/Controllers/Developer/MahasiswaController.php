<?php

namespace App\Http\Controllers\Developer;

use App\Exports\MahasiswasExport;
use App\Imports\MahasiswasImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        $prodi = Prodi::all();
        $kelas = Kelas::all();
        $ti = Mahasiswa::where('prodi_id', 'like', '1')->get();
        $si = Mahasiswa::where('prodi_id', 'like', '2')->get();
        $rpl = Mahasiswa::where('prodi_id', 'like', '3')->get();
        $mi = Mahasiswa::where('prodi_id', 'like', '4')->get();
        $ka = Mahasiswa::where('prodi_id', 'like', '5')->get();
        $data['title'] = 'Manajemen Mahasiswa';
        $data['desc'] = 'Fitur Untuk Memanajemen Mahasiswa';
        return view('developer.mahasiswa.index',$data ,compact('mahasiswa','ti','si','mi','ka','rpl','prodi','kelas'));
    }
    
    public function teknikinformatika()
    {
        $mahasiswa = Mahasiswa::all();
        $prodi = Prodi::all();
        $kelas = Kelas::all();
        $ti = Mahasiswa::where('prodi_id', 'like', '1')->get();
        $si = Mahasiswa::where('prodi_id', 'like', '2')->get();
        $rpl = Mahasiswa::where('prodi_id', 'like', '3')->get();
        $mi = Mahasiswa::where('prodi_id', 'like', '4')->get();
        $ka = Mahasiswa::where('prodi_id', 'like', '5')->get();
        $data['title'] = 'Manajemen Mahasiswa Prodi Teknik Informatika';
        $data['desc'] = 'Fitur Untuk Memanajemen Mahasiswa Prodi Teknik Informatika';
        return view('developer.mahasiswa.ti',$data ,compact('mahasiswa','ti','si','rpl','mi','ka','prodi','kelas'));
        // echo "Halo !";
    }

    public function rekayasaperangkatlunak()
    {
        $mahasiswa = Mahasiswa::all();
        $prodi = Prodi::all();
        $kelas = Kelas::all();
        $ti = Mahasiswa::where('prodi_id', 'like', '1')->get();
        $si = Mahasiswa::where('prodi_id', 'like', '2')->get();
        $rpl = Mahasiswa::where('prodi_id', 'like', '3')->get();
        $mi = Mahasiswa::where('prodi_id', 'like', '4')->get();
        $ka = Mahasiswa::where('prodi_id', 'like', '5')->get();
        $data['title'] = 'Manajemen Mahasiswa Prodi Rekayasa Perangkat Lunak';
        $data['desc'] = 'Fitur Untuk Memanajemen Mahasiswa Prodi Rekayasa Perangkat Lunak';
        return view('developer.mahasiswa.rpl',$data ,compact('mahasiswa','ti','si','rpl','mi','ka','prodi','kelas'));
        // echo "Halo !";
    }

    public function manajemeninformasi()
    {
        $mahasiswa = Mahasiswa::all();
        $prodi = Prodi::all();
        $kelas = Kelas::all();
        $ti = Mahasiswa::where('prodi_id', 'like', '1')->get();
        $si = Mahasiswa::where('prodi_id', 'like', '2')->get();
        $rpl = Mahasiswa::where('prodi_id', 'like', '3')->get();
        $mi = Mahasiswa::where('prodi_id', 'like', '4')->get();
        $ka = Mahasiswa::where('prodi_id', 'like', '5')->get();
        $data['title'] = 'Manajemen Mahasiswa Prodi Manajemen Informasi';
        $data['desc'] = 'Fitur Untuk Memanajemen Mahasiswa Prodi Manajemen Informasi';
        return view('developer.mahasiswa.mi',$data ,compact('mahasiswa','ti','si','rpl','mi','ka','prodi','kelas'));
        // echo "Halo !";
    }

    public function komputerisasiakuntansi()
    {
        $mahasiswa = Mahasiswa::all();
        $prodi = Prodi::all();
        $kelas = Kelas::all();
        $ti = Mahasiswa::where('prodi_id', 'like', '1')->get();
        $si = Mahasiswa::where('prodi_id', 'like', '2')->get();
        $rpl = Mahasiswa::where('prodi_id', 'like', '3')->get();
        $mi = Mahasiswa::where('prodi_id', 'like', '4')->get();
        $ka = Mahasiswa::where('prodi_id', 'like', '5')->get();
        $data['title'] = 'Manajemen Mahasiswa Prodi Komputerisasi Akuntansi';
        $data['desc'] = 'Fitur Untuk Memanajemen Mahasiswa Prodi Komputerisasi Akuntansi';
        return view('developer.mahasiswa.ka',$data ,compact('mahasiswa','ti','si','rpl','mi','ka','prodi','kelas'));
        // echo "Halo !";
    }

    public function sisteminformasi()
    {
        $mahasiswa = Mahasiswa::all();
        $prodi = Prodi::all();
        $kelas = Kelas::all();
        $ti = Mahasiswa::where('prodi_id', 'like', '1')->get();
        $si = Mahasiswa::where('prodi_id', 'like', '2')->get();
        $rpl = Mahasiswa::where('prodi_id', 'like', '3')->get();
        $mi = Mahasiswa::where('prodi_id', 'like', '4')->get();
        $ka = Mahasiswa::where('prodi_id', 'like', '5')->get();
        $data['title'] = 'Manajemen Mahasiswa Prodi Sistem Informasi';
        $data['desc'] = 'Fitur Untuk Memanajemen Mahasiswa Prodi Sistem Informasi';
        return view('developer.mahasiswa.si',$data ,compact('mahasiswa','ti','si','rpl','mi','ka','prodi','kelas'));
        // echo "Halo !";
    }

    // public function mahasiswa_export()
	// {
	// 	return Excel::download(new MahasiswaExport, 'mahasiswa.xlsx');
	// }

    public function export() 
    {
        $time = Carbon::now();
        return Excel::download(new MahasiswasExport, 'mahasiswa-'.$time.'.csv');
    }
       
    public function import() 
    {
        Excel::import(new MahasiswasImport,request()->file('file'));
               
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add Category';
        $data['desc'] = 'Add category in here';
        $prodi = Prodi::all();
        $kelas = Kelas::all();
        $users = User::all();
        return view('developer.mahasiswa.create',$data ,compact('prodi','kelas', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nama_lengkap"     => "required",
            // "id_prodi"     => "required",
            // "id_kelas"     => "required",
            // // "foto_profil"     => "required",
            // // "jenis_kelamin"      => "required",
            // // "tempat_lahir"  => "required",
            // // "tanggal_lahir"      => "required",  
            // "nomor_telepon"  => "required",
            // "email" => "required",
            // "password" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $mahasiswa               = new Mahasiswa();

        $foto_profile              = $request->file('foto_profile');
        if($foto_profile){
            $foto_profile_path     = $foto_profile->store('images/profile', 'public');
            $mahasiswa->foto_profile    = $foto_profile_path;
        }
        
        $mahasiswa->prodi_id        = $request->prodi_id;
        $mahasiswa->kelas_id        = $request->kelas_id;
        $mahasiswa->akun_id         = $request->akun_id;
        $mahasiswa->nim             = $request->nim;
        $mahasiswa->nama_lengkap    = $request->nama_lengkap;
        $mahasiswa->jenis_kelamin   = $request->jenis_kelamin;
        $mahasiswa->tempat_lahir    = $request->tempat_lahir;
        $mahasiswa->tanggal_lahir   = $request->tanggal_lahir;
        $mahasiswa->nomor_telepon   = $request->nomor_telepon;
        $mahasiswa->email           = $request->email;
        $mahasiswa->password        = Hash::make($request->password);
        $mahasiswa->save();

        return redirect('/mahasiswa/index')->with('success', 'Post added successfully');
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
        $prodi = Prodi::findOrFail($id);
        $prodi->nama_prodi = $request->nama_prodi;
        $prodi->nama_kaprodi = $request->nama_kaprodi;
        $prodi->save();
        
        return redirect()->back()->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();
        
        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }
}
