<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Barang;
use App\Models\Inventaris;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function ruangan()
    {
        $inven = Inventaris::all();
        $ruangan = Ruangan::all();
        $data['title'] = 'Manajemen Ruangan';
        $data['desc'] = 'Fitur Untuk Menampilkan Ruangan';
        return view('developer.inventaris.ruangan.index',$data ,compact('ruangan', 'inven'));
    }

    public function barang()
    {
        $inven = Inventaris::all();
        $barang = Barang::all();
        // $kategoribarang = KategoriBarang::all();
        $data['title'] = 'Manajemen Barang';
        $data['desc'] = 'Fitur Untuk Menampilkan Ruangan';
        return view('developer.inventaris.barang.index',$data ,compact('barang', 'inven'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
