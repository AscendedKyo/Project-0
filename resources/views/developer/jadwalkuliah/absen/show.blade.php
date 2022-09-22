@extends('developer.mazer.panel')

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
                          <option selected value="{{ $absen->mahasiswa->name }}">{{ $absen->mahasiswa->name }}</option>
                        </select>
                      </div>
                      <div class="mb-3 col-md-6 divider divider-left">
                        <label for="prodi_id" class="form-label divider-text">Prodi</label>
                        <select name="prodi_id" id="prodi_id" class="select2 form-select">
                              <option selected value="{{ $absen->prodi->id }}">{{ $absen->prodi->nama_prodi }}</option>
                        </select>   
                      </div>
                      <div class="mb-3 col-md-6 divider divider-left">
                        <label for="kelas_id" class="form-label divider-text">Kelas</label>
                        <select name="kelas_id" id="kelas_id" class="select2 form-select">
                              <option value="{{ $absen->kelas->id }}" selected>{{ $absen->kelas->nama_kelas }}</option>
                        </select>   
                      </div>
                      <div class="mb-3 col-md-6 divider divider-left">
                        <label for="matakuliah_id" class="form-label divider-text">Mata Kuliah</label>
                        <select name="matakuliah_id" id="matakuliah_id" class="select2 form-select">
                              <option selected value="{{ $absen->matakuliah->id }}">{{ $absen->matakuliah->nama_matakuliah }}</option>
                          </select> 
                      </div>
                      <div class="mb-3 col-md-6 divider divider-left">
                        <label for="bukti" class="form-label divider-text">Pertemuan</label>
                        <select name="pertemuan" id="pertemuan" class="select2 form-select">
                              <option selected value="{{ $absen->pertemuan }}">{{ $absen->pertemuan }}</option>
                        </select> 
                      </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="absen" class="form-label divider-text">Absen</label>
                          <select name="absen" id="absen" class="select2 form-select">
                              <option selected value="{{ $absen->absen }}">{{ $absen->absen }}</option>
                          </select> 
                        </div>
                        <div class="mb-12 col-md-12 divider "> 
                        <label for="absen" class="form-label divider-center divider-text">Bukti Absen Hadir</label>
                            <div class="row">
                                <div class="col-3 col-sm-3 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">

                                </div>
                                <div class="col-6 col-sm-6 col-lg-6 mt-2 mt-md-0 mb-md-0 mb-2">
                                    <a href="#">
                                        <img class="w-100" src="{{asset('storage/images/bukti-absen/'.$absen->bukti)}}" data-bs-target="#Gallerycarousel" data-bs-slide-to="3">
                                    </a>
                                </div>
                            </div>
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