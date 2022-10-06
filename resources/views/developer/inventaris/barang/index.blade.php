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
        <h4>@yield('title', $title)</h4>
    </div>
    <div class="card-body">
        <a href="" class="btn btn-outline-warning"><i class="fas fa-sync"></i> Reload</a>
        <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm"><i class="fas fa-plus"></i> Create</a>
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Kategori Barang</th>
                  <th>Merk Barang</th>
                  <th>Kuantitas</th>
                  <th>Tahun Perolehan</th>
                  <th>Asal Barang</th>
                  <th>Keadaan Barang</th>
                  <th>Harga Barang</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach ($barang as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kategori_barang }}</td>
                    <td>{{ $item->merk_barang }}</td>
                    <td>{{ $item->kuantitas }}</td>
                    <td>{{ $item->tahun_perolehan }}</td>
                    <td>{{ $item->asal_barang }}</td>
                    <td>{{ $item->keadaan_barang }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>
                            <div class="table-links">
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
<!--login form Modal -->
<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Barang </h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" placeholder="Nama Barang"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Kategori Barang"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Merk Barang"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Kuantitas"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Nama Satuan"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Tahun Perolehan"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Asal Barang"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Keadaan Barang"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Harga Barang"
                            class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-outline-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tambah Barang</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection