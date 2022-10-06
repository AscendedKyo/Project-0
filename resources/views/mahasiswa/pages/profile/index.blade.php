
@extends('mahasiswa.mazer.panel')

@section('content')<div class="row">
    <div class="col-md-12">
      <form action="{{ route('mahasiswa.update-data') }}" method="POST" enctype="multipart/form-data">
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
            src="{{asset('storage/images/profile/'.Auth::guard('mahasiswa')->user()->foto_profil)}}"
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
                          <input type="text" class="form-control" name="name" value="{{ Auth::guard('mahasiswa')->user()->name }}">
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="nim" class="form-label divider-text">Nomor Induk Mahasiswa</label>
                          @if(Auth::guard('mahasiswa')->user()->nim == 0000001 )
                          <input type="text" class="form-control" name="nim" value="{{ Auth::guard('mahasiswa')->user()->nim }}">
                          @else
                          <input type="text" disabled class="form-control" name="nim" value="{{ Auth::guard('mahasiswa')->user()->nim }}">
                          @endif
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="tempat_lahir" class="form-label divider-text">Tempat Lahir</label>
                          <input type="text" class="form-control" name="tempat_lahir" value="{{ Auth::guard('mahasiswa')->user()->tempat_lahir }}">
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="tanggal_lahir" class="form-label divider-text">Tanggal Lahir</label>
                          <input type="date" class="form-control" name="tanggal_lahir" value="{{ Auth::guard('mahasiswa')->user()->tanggal_lahir }}">
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="jenis_kelamin" class="form-label divider-text">Jenis Kelamin</label>
                          <select name="jenis_kelamin" id="jenis_kelamin" class="select2 form-select">
                              @if(Auth::guard('mahasiswa')->user()->jenis_kelamin == 1 )
                              <option selected value="1">Pria</option>
                              @elseif(Auth::guard('mahasiswa')->user()->jenis_kelamin == 2 )
                              <option selected value="2">Wanita</option>
                              @else
                              <option selected value="">Pilih Jenis Kelamin</option>
                              <option value="1">Pria</option>
                              <option value="2">Wanita</option>
                              @endif
                            </select>            
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="agama" class="form-label divider-text">Agama</label>
                          <select name="agama" id="agama" class="select2 form-select">
                              @if(Auth::guard('mahasiswa')->user()->agama == 1 )
                              <option selected value="1">Islam</option>
                              @elseif(Auth::guard('mahasiswa')->user()->agama == 2 )
                              <option selected value="2">Kristen</option>
                              @elseif(Auth::guard('mahasiswa')->user()->agama == 3 )
                              <option selected value="3">Hindu</option>
                              @elseif(Auth::guard('mahasiswa')->user()->agama == 4 )
                              <option selected value="4">Buddha</option>
                              @elseif(Auth::guard('mahasiswa')->user()->agama == 5 )
                              <option selected value="5">Konghuchu</option>
                              @elseif(Auth::guard('mahasiswa')->user()->agama == 6 )
                              <option selected value="6">Lainnya</option>
                              @else
                              <option value="" selected>Pilih Agama</option>
                              <option value="1">Islam</option>
                              <option value="2">Kristen</option>
                              <option value="3">Hindu</option>
                              <option value="4">Buddha</option>
                              <option value="5">Konghuchu</option>
                              <option value="6">Lainnya</option>
                              @endif
                          </select>            
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="prodi_id" class="form-label divider-text">Program Studi</label>
                          <select name="prodi_id" id="prodi_id" class="select2 form-select">
                              @if(Auth::guard('mahasiswa')->user()->prodi_id == '0')
                              <option selected value="">Pilih Program Studi</option>
                              @foreach($prodi as $prody)
                              <option value="{{ $prody->id }}">{{ $prody->nama_prodi }}</option>
                              @endforeach
                              @else
                              <option selected value="{{ Auth::guard('mahasiswa')->user()->prodi->id }}">{{ Auth::guard('mahasiswa')->user()->prodi->nama_prodi }}</option>
                              @endif
                          </select>   
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="kelas[]" class="form-label divider-text">Kelas</label>
                          <select name="kelas[]" id="kelas[]" class="form-select select2 @error('kelas') is-invalid @enderror">
                            @foreach($mahasiswas->kelas as $kelas)
                            <option selected value="">{{ $kelas->nama_kelas }}</option>
                            @endforeach
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
                          <input type="text" class="form-control" name="email" value="{{ Auth::guard('mahasiswa')->user()->email }}" disabled>
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="name" class="form-label divider-text">Nomor Telepon</label>
                          <input type="text" class="form-control" name="nomor_telepon" value="{{ Auth::guard('mahasiswa')->user()->nomor_telepon }}" disabled>
                        </div>
                        <div class="mb-3 col-md-6 divider divider-left">
                          <label for="name" class="form-label divider-text">Nama Ayah</label>
                          <input type="text" class="form-control" name="nama_ayah" value="{{ Auth::guard('mahasiswa')->user()->nama_ayah }}">
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
@endsection