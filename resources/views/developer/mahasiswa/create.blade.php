@extends('developer.mazer.panel')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

  <div class="row">
    <div class="col-md-12">
      <form action="{{ route('mahasiswa.store' )}}" method="POST" enctype="multipart/form-data">
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
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4"> 
          <img
            src="{{ asset('storage') }}/images/profile/default.jpg"
            alt="user-avatar"
            class="d-block rounded"
            height="100"
            width="100"
            id="uploadedAvatar"
            />
            <div class="button-wrapper">
              <label for="upload" class="btn btn-outline-primary me-2 mb-4" tabindex="0">
                <span class="d-none d-sm-block">Upload new photo</span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input
                  type="file"
                  id="upload"
                  class="account-file-input"
                  hidden
                  accept="image/png, image/jpeg"
                  name="foto_profil"
                />
              </label>
              <button type="submit" class="btn btn-outline-primary mb-4">
                <i class="bx bx-reset d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Simpan</span>
              </button>
              <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                <i class="bx bx-reset d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Reset</span>
              </button>

              <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
            </div>
          </div>
        </div>
        <div class="card-body">
          <!-- <form id="formAccountSettings" method="POST" onsubmit="return false"> -->
            <div class="row">
                <!-- Data Indentitas Mahasiswa -->
                <div class="divider">
                    <div class="divider-text">Data Identitas Mahasiswa</div>
                    <div class="row">
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="nama_lengkap" class="form-label divider-text">Nama Lengkap</label>
                          <input type="text" class="form-control" name="nama_lengkap">
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="nim" class="form-label divider-text">Nomor Induk Mahasiswa</label>
                          <input type="text" class="form-control" name="nim">
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="prodi_id" class="form-label divider-text">Program Studi</label>
                          <select name="prodi_id" id="prodi_id" class="select2 form-select">
                              <option disabled value="">Pilih Program Studi</option>
                              @foreach ($prodi as $prody)
                              <option value="{{ $prody->id }}">{{ $prody->nama_prodi }}</option>
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
                          <label for="jenis_kelamin" class="form-label divider-text">Jenis Kelamin</label>
                          <select name="jenis_kelamin" id="jenis_kelamin" class="select2 form-select">
                              <option value="">Pilih Jenis Kelamin</option>
                              <option value="Laki Laki">Laki Laki</option>
                              <option value="Perempuan">Perempuan</option>
                          </select>            
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="agama" class="form-label divider-text">Agama</label>
                          <select name="agama" id="agama" class="select2 form-select">
                              <option value="" selected>Pilih Agama</option>
                              <option value="Islam">Islam</option>
                              <option value="Kristen">Kristen</option>
                              <option value="Hindu">Hindu</option>
                              <option value="Buddha">Buddha</option>
                              <option value="Konghuchu">Konghuchu</option>
                              <option value="Lainnya">Lainnya</option>
                          </select>            
                        </div>
                    </div>
                </div>
                <!-- Data Informasi Kontak -->
                <div class="divider">
                    <div class="divider-text">Data Informasi Kontak</div>
                    <div class="row">
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="name" class="form-label divider-text">Alamat Email</label>
                          <input type="text" class="form-control" name="email">
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="name" class="form-label divider-text">Nomor Telepon</label>
                          <input type="text" class="form-control" name="nomor_telepon">
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="name" class="form-label divider-text">Nama Ayah</label>
                          <input type="text" class="form-control" name="nama_ayah">
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="name" class="form-label divider-text">Nama Ibu</label>
                          <input type="text" class="form-control" name="nama_ibu">
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="name" class="form-label divider-text">Nomor Telepon Ayah</label>
                          <input type="text" class="form-control" name="nomor_telepon_ayah">
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="name" class="form-label divider-text">Nomor Telepon Ibu</label>
                          <input type="text" class="form-control" name="nomor_telepon_ibu">
                        </div>
                    </div>
                </div>
                <!-- Data Domisili Mahasiswa -->
                <div class="divider">
                    <div class="divider-text">Data Domilisi Mahasiswa</div>
                    <div class="row">
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="name" class="form-label divider-text">Alamat Lengkap</label>
                          <input type="text" class="form-control" name="alamat_rumah">
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="name" class="form-label divider-text">Kelurahan</label>
                          <input type="text" class="form-control" name="nama_kelurahan">
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="name" class="form-label divider-text">Kecamatan</label>
                          <input type="text" class="form-control" name="nama_kecamatan">
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="name" class="form-label divider-text">Kota</label>
                          <input type="text" class="form-control" name="nama_kota">
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="name" class="form-label divider-text">Provinsi</label>
                          <input type="text" class="form-control" name="nama_provinsi">
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="name" class="form-label divider-text">Negara</label>
                          <input type="text" class="form-control" name="nama_negara" placeholder="Indonesia">
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
      <div class="card">
        <h5 class="card-header">Delete Account</h5>
        <div class="card-body">
          <div class="mb-3 col-12 mb-0">
            <div class="alert alert-warning">
              <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
              <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
            </div>
          </div>
          <form id="formAccountDeactivation" onsubmit="return false">
            <div class="form-check mb-3">
              <input
                class="form-check-input"
                type="checkbox"
                name="accountActivation"
                id="accountActivation"
              />
              <label class="form-check-label" for="accountActivation"
                >I confirm my account deactivation</label
              >
            </div>
            <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
          </form>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection