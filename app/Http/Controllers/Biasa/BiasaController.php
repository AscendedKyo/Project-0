<?php

namespace App\Http\Controllers\Biasa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BiasaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('biasa.index',$data , compact('mahasiswa'));
    }
}
