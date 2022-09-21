@extends('developer.mazer.panel')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Data Mahasiswa Setiap Prodi</h4>
    </div>
    <div class="card-body">
        <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary btn-icon icon-left">
                        <i class="fas fa-newspaper"></i>  Semua Prodi <span class="badge bg-transparent">{{ $jadwalkuliah->count(); }}</span>
                    </a>
                    <a href="#" class="btn btn-outline-primary btn-icon icon-left">
                        <i class="fas fa-newspaper"></i>  Teknik Informatika <span class="badge bg-transparent">{{ $ti->count(); }}</span>
                    </a>
                    <a href="#" class="btn btn-outline-warning btn-icon icon-left">
                        <i class="fas fa-newspaper"></i>  Sistem Informasi <span class="badge bg-transparent">{{ $si->count(); }}</span>
                    </a>
                    <a href="#" class="btn btn-outline-info btn-icon icon-left">
                        <i class="fas fa-newspaper"></i>  Rekayasa Perangkat Lunak <span class="badge bg-transparent">{{ $rpl->count(); }}</span>
                    </a>
                    <a href="#" class="btn btn-outline-success btn-icon icon-left">
                        <i class="fas fa-newspaper"></i>  Manajemen Informasi <span class="badge bg-transparent">{{ $mi->count(); }}</span>
                    </a>
                    <a href="#" class="btn btn-outline-danger btn-icon icon-left">
                        <i class="fas fa-newspaper"></i>  Komputerisasi Akuntasi <span class="badge bg-transparent">{{ $ka->count(); }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
      
<div class="card">
    <div class="card-header">
        <h4>@yield('title', $title)</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-10">
                <a href="" class="btn btn-outline-warning"><i class="fa-solid fa-sync"></i> Reload</a>
                <a href="{{ route('jadwalkuliah.create') }}" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i> Create</a>
                <a href="{{ route('mahasiswa.export') }}" class="btn btn-outline-success"><i class="fa-solid fa-download"></i> Export</a>
                <a href="{{ route('mahasiswa.import') }}" class="btn btn-outline-info"><i class="fa-solid fa-download"></i> Import</a>
            </div>
            <div class="col-2">
            </div>
        </div>
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
                  <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach ($jadwalkuliah as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->pertemuan }}</td>
                    <td>{{ $item->matakuliah->nama_matakuliah }}</td>
                    <td>{{ $item->sks }}</td>
                    <td>{{ $item->kelas->nama_kelas }}</td>
                    <td>{{ $item->dosen->name }}</td>
                    <td>{{ $item->metode }}</td>
                    <td>{{ $item->ruangan->nama_ruangan }}</td>
                    <td>{{ $item->hari }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->jam_mulai.'-'.$item->jam_selesai }}</td>
                    <td>
                            <div class="table-links">
                              <a class="btn btn-sm btn-outline-info" href="{{ url('/developer/absen', $item->slug) }}"><i class="fas fa-eye"></i> Absen</a>
                              <a class="btn btn-sm btn-outline-primary" href="{{ route('jadwalkuliah.edit', $item->id) }}"><i class="fas fa-edit"></i> Edit</a>
                              <form method="POST" action="{{route('jadwalkuliah.destroy', [$item->id])}}" class="d-inline">
                                @csrf
                                <!-- <a type="submit" href="" class="text-danger">Delete Permanent</a> -->
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i> Trash</button>
                                <!-- <input type="submit" value="Trash" class="btn btn-sm btn-outline-danger"> -->
                              </form>
                            </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection