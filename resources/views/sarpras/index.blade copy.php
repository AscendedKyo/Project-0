@extends('biasa.mazer.panel')

@section('content')
      
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Dashboard Mahasiswa</h4>
  </div>
  <div class="card-body">
    <p>Selamat Datang {{ Auth::user()->name }}. Silahkan tunggu jadwal ya</p>
  </div>
</div>
@endsection