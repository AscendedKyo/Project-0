@extends('mahasiswa.mazer.panel')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

  <div class="row">
    <div class="col-md-12">
      <form action="{{ route('mahasiswa.absen-action') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @if(session('success'))
      <p class="alert alert-success">{{ session('success') }}</p>
      @endif
      @if($errors->any())
      @foreach($errors->all() as $err)
      <p class="alert alert-danger">{{ $err }}</p>
      @endforeach
      @endif
      <div class="card">
        <h5 class="card-header">Perhatian !</h5>
        <div class="card-body">
          <div class="mb-3 col-12 mb-0">
            <div class="alert alert-warning">
              <h6 class="alert-heading fw-bold mb-1">Petunjuk Penggunaan Sistem Absensi</h6>
              <p>1. Absen hanya bisa diakses selama jam mulai perkuliahan sampai dengan selesainya.</p>
              <p>2. Mahasiswa diperkenankan absen melalui web ini dengan memilih kolom absen dan upload bukti hadir pada saat tatap muka maupun teleconference.</p>
              <p>3. Mahasiswa diperkenankan upload bukti hadir pada saat berada dikelas dan untuk perkuliahan teleconference dengan cara ScreenShot layar ketika dosen sedang menjelaskan materi.</p>
            </div>
          </div>
        </div>
      </div>
      @if($limiterdate = $now->toDateString() && $limiterstart > $now->toTimeString() && $limiterend > $now->toTimeString())
      <div class="card mb-4">
        <h5 class="card-header">Absen</h5>
        <!-- Account -->
        <div class="card-body">
          <!-- <form id="formAccountSettings" method="POST" onsubmit="return false"> -->
            <h5>Absen Saat Ini Tidak Tersedia</h5>
            <!-- </form> -->
        </div>
        <!-- /Account -->
      </div>
      @else
      <div class="card mb-4">
        <h5 class="card-header">Absen</h5>
        <!-- Account -->
        <div class="card-body">
          <!-- <form id="formAccountSettings" method="POST" onsubmit="return false"> -->
            <div class="row">
                <!-- Data Indentitas Mahasiswa -->
                <div class="divider">
                    <div class="divider-text">Data Absensi Mahasiswa</div>
                    <div class="row">
                      <div class="mb-3 col-md-6 divider divider-left">
                        <label for="mahasiswa_id" class="form-label divider-text">Nama Lengkap</label>
                        <select name="mahasiswa_id" id="mahasiswa_id" class="select2 form-select">
                          <option selected value="{{ Auth::guard('mahasiswa')->user()->id }}">{{ Auth::guard('mahasiswa')->user()->name }}</option>
                        </select>
                      </div>
                      <div class="mb-3 col-md-6 divider divider-left">
                        <label for="prodi_id" class="form-label divider-text">Prodi</label>
                        <select name="prodi_id" id="prodi_id" class="select2 form-select">
                              @if(Auth::guard('mahasiswa')->user()->prodi_id == '0')
                              <option selected value="">Pilih Program Studi</option>
                              @foreach ($prodi as $prody)
                              <option value="{{ $prody->id }}">{{ $prody->nama_prodi }}</option>
                              @endforeach
                              @else
                              <option selected value="{{ Auth::guard('mahasiswa')->user()->prodi->id }}">{{ Auth::guard('mahasiswa')->user()->prodi->nama_prodi }}</option>
                              @endif
                        </select>   
                      </div>
                      <div class="mb-3 col-md-6 divider divider-left">
                        <label for="kelas_id" class="form-label divider-text">Kelas</label>
                        <select name="kelas_id" id="kelas_id" class="select2 form-select">
                              @if(Auth::guard('mahasiswa')->user()->kelas_id == '0')
                              <option value="" selected>Pilih Kelas</option>
                              @foreach ($kelas as $class)
                              <option value="{{ $class->id }}">{{ $class->nama_kelas }}</option>
                              @endforeach
                              @else
                              <option selected value="{{ Auth::guard('mahasiswa')->user()->kelas->id }}">{{ Auth::guard('mahasiswa')->user()->kelas->nama_kelas }}</option>
                              @endif
                        </select>   
                      </div>
                      <div class="mb-3 col-md-6 divider divider-left">
                        <label for="matakuliah_id" class="form-label divider-text">Mata Kuliah</label>
                        <select name="matakuliah_id" id="matakuliah_id" class="select2 form-select">
                              <option selected value="">Pilih Matakuliah</option>
                              @foreach($matakuliah as $item)
                              <option value="{{ $item->id }}">{{ $item->nama_matakuliah }}</option>
                              @endforeach
                          </select> 
                      </div>
                      <div class="mb-3 col-md-6 divider divider-left">
                        <label for="bukti" class="form-label divider-text">Pertemuan</label>
                        <select name="pertemuan" id="pertemuan" class="select2 form-select">
                              <option selected value="">Pilih Pertemuan</option>
                              <option value="1">Pertemuan 1</option>
                              <option value="2">Pertemuan 2</option>
                              <option value="3">Pertemuan 3</option>
                              <option value="4">Pertemuan 4</option>
                              <option value="5">Pertemuan 5</option>
                              <option value="6">Pertemuan 6</option>
                              <option value="7">Pertemuan 7</option>
                              <option value="8">Pertemuan 8</option>
                              <option value="9">Pertemuan 9</option>
                              <option value="10">Pertemuan 10</option>
                              <option value="11">Pertemuan 11</option>
                              <option value="12">Pertemuan 12</option>
                              <option value="13">Pertemuan 13</option>
                              <option value="14">Pertemuan 14</option>
                        </select> 
                      </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="absen" class="form-label divider-text">Absen</label>
                          <select name="absen" id="absen" class="select2 form-select">
                              <option selected value="">Keterangan Absen</option>
                              <option value="Hadir">Hadir</option>
                              <option value="Sakit">Sakit</option>
                              <option value="Izin">Izin</option>
                          </select> 
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="bukti" class="form-label divider-text">Bukti</label>
                          <input type="file" class="form-control" name="bukti">
                        </div>
                    </div>
                </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Save changes</button>
              <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
          <!-- </form> -->
        </div>
        <!-- /Account -->
      </div>
      @endif
    </form>
  </div>
</div>
</div>
@endsection