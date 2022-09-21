<?php

namespace App\Http\Controllers\Sarpras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SarprasController extends Controller
{
    public function index()
    {
        return view('biasa.index');
    }
}
