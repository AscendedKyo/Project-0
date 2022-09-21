@extends('developer.mazer.panel')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-primary btn-icon icon-left">
                    <i class="fas fa-newspaper"></i> Data Kelas <span class="badge bg-transparent">#</span>
                </a>
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
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i> Create</a>
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
                  <th>Prodi</th>
                  <th>Kelas</th>
                  <th>Mata Kuliah</th>
                  <th>Nama Lengkap</th>
                  <th>Pertemuan</th>
                  <th>Absen</th>
                  <th>Waktu Absen</th>
                  <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach ($absensi as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->prodi->nama_prodi }}</td>
                    <td>{{ $item->kelas->nama_kelas }}</td>
                    <td>{{ $item->matakuliah->nama_matakuliah }}</td>
                    <td>{{ $item->mahasiswa->name }}</td>
                    <td>{{ $item->pertemuan }}</td>
                    <td>{{ $item->absen }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                            <div class="table-links">
                              <a class="btn btn-sm btn-outline-info" href="#"><i class="fas fa-eye"></i> Absen</a>
                              <a class="btn btn-sm btn-outline-primary" href="#"><i class="fas fa-edit"></i> Edit</a>
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