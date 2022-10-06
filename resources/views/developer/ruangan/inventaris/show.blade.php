@extends('developer.mazer.panel')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-primary btn-icon icon-left">
                    <i class="fas fa-newspaper"></i> Data Ruangan <span class="badge bg-transparent">#</span>
                </a>
            </div>
        </div>
    </div>
</div>
      
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-10">
                <h4>@yield('title', $title)</h4>
            </div>
            <div class="col-2">
                <a href="" class="btn btn-outline-warning"><i class="fas fa-sync"></i> Reload</a>
                <a href="{{ route('ruangan.create') }}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Create</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Inventaris</th>
                  <th>Nama Barang</th>
                  <th>Kategori Barang</th>
                  <th>Info Ruangan</th>
                  <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach ($ruangan as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->kode_ruangan }}</td>
                    <td>{{ $item->nama_ruangan }}</td>
                    <td>{{ $item->lokasi_ruangan }}</td>
                    <td>{{ $item->isActive }}</td>
                    <td>
                            <div class="table-links">
                              <a class="btn btn-sm btn-outline-primary" href="{{ route('ruangan.show', $item->id) }}"><i class="fas fa-edit"></i> Daftar Inventaris</a>
                              <a class="btn btn-sm btn-outline-primary" href="{{ route('ruangan.edit', $item->id) }}"><i class="fas fa-edit"></i> Edit</a>
                              <form method="POST" action="{{route('ruangan.destroy', [$item->id])}}" class="d-inline">
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