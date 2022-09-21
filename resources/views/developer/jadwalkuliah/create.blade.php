@extends('developer.mazer.panel')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

  <div class="row">
    <div class="col-md-12">
      <form action="{{ route('jadwalkuliah.store' )}}" method="POST" enctype="multipart/form-data">
      @csrf
      @if(session('success'))
      <p class="alert alert-success">{{ session('success') }}</p>
      @endif
      @if($errors->any())
      @foreach($errors->all() as $err)
      <p class="alert alert-danger">{{ $err }}</p>
      @endforeach
      @endif
      <div class="card mb-4">
        <h4 class="card-header">Tambah Jadwal Perkuliahan</h4>
        <div class="card-body">
          <!-- <form id="formAccountSettings" method="POST" onsubmit="return false"> -->
            <div class="row">
                <!-- Data Indentitas Mahasiswa -->
                <div class="divider">
                    <div class="divider-text">Tambah Jadwal Perkuliahan</div>
                    <div class="row">
                      <div class="mb-3 col-md-6 divider divider-left">
                        <label for="matakuliah_id" class="form-label divider-text">Mata Kuliah</label>
                        <select name="matakuliah_id" id="matakuliah_id" class="select2 form-select">
                          <option selected value="">Pilih Mata Kuliah</option>
                          @foreach ($matakuliah as $matkul)
                          <option value="{{ $matkul->id }}">{{ $matkul->nama_matakuliah }}</option>
                          @endforeach
                        </select>            
                      </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="pertemuan" class="form-label divider-text">Pertemuan</label>
                          <select name="pertemuan" id="pertemuan" class="select2 form-select">
                              <option value="" selected>Pilih Pertemuan</option>
                              <option value="1">Pertemuan Ke 1</option>
                              <option value="2">Pertemuan Ke 2</option>
                              <option value="3">Pertemuan Ke 3</option>
                              <option value="4">Pertemuan Ke 4</option>
                              <option value="5">Pertemuan Ke 5</option>
                              <option value="6">Pertemuan Ke 6</option>
                              <option value="7">Pertemuan Ke 7</option>
                              <option value="8">Pertemuan Ke 8</option>
                              <option value="9">Pertemuan Ke 9</option>
                              <option value="10">Pertemuan Ke 10</option>
                              <option value="11">Pertemuan Ke 11</option>
                              <option value="12">Pertemuan Ke 12</option>
                              <option value="13">Pertemuan Ke 13</option>
                              <option value="14">Pertemuan Ke 14</option>
                          </select>          
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="prodi_id" class="form-label divider-text">Program Studi</label>
                          <select name="prodi_id" id="prodi_id" class="select2 form-select">
                              <option value="" selected>Pilih Program Studi</option>
                              @foreach ($prodi as $item) 
                              <option value="{{ $item->id }}">{{ $item->nama_prodi }}</option>
                              @endforeach
                          </select>            
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="kelas_id" class="form-label divider-text">Kelas</label>
                          <select name="kelas_id" id="kelas_id" class="select2 form-select">
                              <option value="">Pilih Kelas</option>
                              @foreach ($kelas as $class)
                              <option value="{{ $class->id }}">{{ $class->nama_kelas }}</option>
                              @endforeach
                          </select>            
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="dosen_id" class="form-label divider-text">Dosen Pengajar</label>
                          <select name="dosen_id" id="dosen_id" class="select2 form-select">
                            <option value="">Pilih Dosen</option>
                            @foreach ($dosen as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>            
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="sks" class="form-label divider-text">SKS</label>
                          <select name="sks" id="sks" class="select2 form-select">
                              <option value="" selected>Pilih Jumlah SKS</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                          </select> 
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="metode" class="form-label divider-text">Metode</label>
                          <select name="metode" id="metode" class="select2 form-select">
                              <option value="">Pilih Metode</option>
                              <option value="Tatap Muka">Tatap Muka</option>
                              <option value="Teleconference">Teleconfrence</option>
                              <option value="E-Learning">E-Learning</option>
                          </select>            
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="ruangan_id" class="form-label divider-text">Ruangan</label>
                          <select name="ruangan_id" id="ruangan_id" class="select2 form-select">
                              <option value="" selected>Pilih Ruangan</option>
                              @foreach ($ruangan as $ruang)
                              <option value="{{ $ruang->id }}">{{ $ruang->nama_ruangan }}</option>
                              @endforeach
                          </select>            
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="hari" class="form-label divider-text">Hari</label>
                          <select name="hari" id="hari" class="select2 form-select">
                              <option value="" selected>Pilih Hari</option>
                              <option value="Senin">Senin</option>
                              <option value="Selasa">Selasa</option>
                              <option value="Rabu">Rabu</option>
                              <option value="Kamis">Kamis</option>
                              <option value="Jum'at">Jum'at</option>
                              <option value="Sabtu">Sabtu</option>
                          </select>   
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="tanggal" class="form-label divider-text">Tanggal</label>
                          <input type="date" class="form-control" name="tanggal">
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="jam_mulai" class="form-label divider-text">Jam Mulai</label>
                          <input type="time" class="form-control" name="jam_mulai">
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="jam_selesai" class="form-label divider-text">Jam Selesai</label>
                          <input type="time" class="form-control" name="jam_selesai">
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
      </form>
    </div>
  </div>
</div>
@endsection