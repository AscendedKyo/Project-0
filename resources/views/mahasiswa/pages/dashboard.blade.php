@extends('mahasiswa.mazer.panel')

@section('content')

@if(Auth::guard('mahasiswa')->user()->nim == 0000001 & Auth::guard('mahasiswa')->user()->prodi_id == 0 & Auth::guard('mahasiswa')->user()->kelas_id == 0)
<div class="card">
  <div class="card-header">
    <h4 class="card-title">{{ $title }}</h4>
  </div>
  <form action="{{ route('mahasiswa.update-info') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="card-body">
    <div class="divider">
      <div class="divider-text">Silahkan Lengkapi Data Anda</div>
      <div class="row">
        <div class="mb-3 col-md-6 divider divider-left">
          <label for="nama_lengkap" class="form-label divider-text">Nama Lengkap</label>
          <input type="text" class="form-control" name="name" value="{{ Auth::guard('mahasiswa')->user()->name }}">
        </div>
        <div class="mb-3 col-md-6 divider divider-left">
          <label for="nim" class="form-label divider-text">Nomor Induk Mahasiswa</label>
          <input type="text" class="form-control" name="nim">
        </div>
        <div class="mb-3 col-md-6 divider divider-left">
          <label for="prodim" class="form-label divider-text">Program Studi</label>
          <select class="select2 form-select" name="prodim" id="prodim">
            <option selected value="">Pilih Program Studi</option>
            @foreach( $prodi as $prody )
            <option value="{{ $prody->id }}">{{ $prody->nama_prodi }}</option>
            @endforeach            
          </select>
        </div>
        <div class="mb-3 col-md-6 divider divider-left">
          <label for="kelas" class="form-label divider-text">Kelas</label>
          <select class="select2 form-select" name="kelas[]" id="kelas">
            <option selected value="">Pilih Kelas</option>
            @foreach( $kelas as $class )
            <option value="{{ $class->id }}">{{ $class->nama_kelas }}</option>
            @endforeach            
          </select>
        </div>        
      </div>
    </div>
    <div class="mt-2">
      <button type="submit" class="btn btn-outline-primary me-2">Simpan</button>
    </div>
  </div>
  </form>
</div>
@else
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Jadwal Perkuliahan</h4>
  </div>
  <div class="card-body">
    <table class="table table-striped" id="table1">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Pertemuan</th>
                  <th>Mata Kuliah</th>
                  <th>SKS</th>
                  <th>Kelas</th>
                  <th>Dosen Pengajar</th>
                  <th>Metode</th>
                  <th>Ruangan</th>
                  <th>Hari</th>
                  <th>Tanggal</th>
                  <th>Waktu</th>
                  <th>Absensi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0 ?>
                @foreach ($jadwalkuliah as $key => $item)
                @if($item->kelas_id == Auth::guard('mahasiswa')->user()->kelas_id && $item->tanggal == $today->toDateString())
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $item->pertemuan }}</td>
                    <td>{{ $item->matakuliah->nama_matakuliah }}</td>
                    <td>{{ $item->sks }}</td>
                    <td>{{ $item->kelas->nama_kelas }}</td>
                    <td>{{ $item->dosen->name }}</td>
                    <td>{{ $item->metode }}</td>
                    <td>{{ $item->ruangan->nama_ruangan }}</td>
                    <td>{{ $item->hari }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->jam_mulai.' - '.$item->jam_selesai }}</td>
                    @if($item->jam_mulai < $now->toTimeString() && $item->jam_selesai > $now->toTimeString())
                    <td>
                      <a class="btn btn-outline-primary" href="{{ route('mahasiswa.absen', $item->slug) }}"><i class="fa-solid fa-clipboard-user"></i> Absensi</a>
                    </td>
                    @else
                    <td>
                      <a class="btn btn-outline-danger" href="#"><i class="fa-solid fa-clipboard-user"></i> Tidak Tersedia</a>
                    </td>
                    @endif
                  </tr>
                @endif
                @endforeach
            </tbody>
        </table>
      <p>Mohon Maaf Hari Ini Tidak Ada Jadwal Kuliah</p>
  </div>
</div>

@endif
@endsection