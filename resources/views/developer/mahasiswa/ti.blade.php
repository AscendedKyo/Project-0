@extends('developer.mazer.panel')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Data Mahasiswa Setiap Prodi</h4>
    </div>
    <div class="card-body">
        <div class="row">
                <div class="col-12">
                   <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary btn-icon icon-left">
                        <i class="fa-solid fa-graduation-cap"></i>  Semua Prodi <span class="badge bg-transparent">{{ $mahasiswa->count(); }}</span>
                    </a>
                    <a href="{{ route('mahasiswa.teknikinformatika') }}" class="btn btn-primary btn-icon icon-left">
                        <i class="fa-solid fa-microchip"></i>  Teknik Informatika <span class="badge bg-transparent">{{ $ti->count(); }}</span>
                    </a>
                    <a href="{{ route('mahasiswa.sisteminformasi') }}" class="btn btn-outline-warning btn-icon icon-left">
                        <i class="fa-solid fa-shield-halved"></i>  Sistem Informasi <span class="badge bg-transparent">{{ $si->count(); }}</span>
                    </a>
                    <a href="{{ route('mahasiswa.rekayasaperangkatlunak') }}" class="btn btn-outline-info btn-icon icon-left">
                        <i class="fa-brands fa-unity"></i>  Rekayasa Perangkat Lunak <span class="badge bg-transparent">{{ $rpl->count(); }}</span>
                    </a>
                    <a href="{{ route('mahasiswa.manajemeninformasi') }}" class="btn btn-outline-success btn-icon icon-left">
                        <i class="fa-solid fa-shield-heart"></i>  Manajemen Informasi <span class="badge bg-transparent">{{ $mi->count(); }}</span>
                    </a>
                    <a href="{{ route('mahasiswa.komputerisasiakuntansi') }}" class="btn btn-outline-danger btn-icon icon-left">
                        <i class="fa-solid fa-receipt"></i>  Komputerisasi Akuntasi <span class="badge bg-transparent">{{ $ka->count(); }}</span>
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
                  <th>NIM</th>
                  <th>Nama Lengkap</th>
                  <th>Prodi</th>
                  <th>Kelas</th>
                  <th>Email</th>
                  <th>Nomor Telepon</th>
                  <th>Created At</th>
                  <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach ($ti as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->prodi->nama_prodi }}</td>
                    <td>{{ $item->kelas->nama_kelas }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->nomor_telepon }}</td>
                    <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                    <td>
                            <div class="table-links">
                              <a class="btn btn-sm btn-outline-info" href="{{ url('/mahasiswa/'.$item->slug) }}"><i class="fas fa-eye"></i> View</a>
                              <a class="btn btn-sm btn-outline-primary" href="{{ route('mahasiswa.edit', $item->id) }}"><i class="fas fa-edit"></i> Edit</a>
                              <form method="POST" action="{{route('mahasiswa.destroy', [$item->id])}}" class="d-inline">
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