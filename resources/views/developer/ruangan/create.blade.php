@extends('developer.mazer.panel')

@section('content')
      <!-- Main Content -->
            <div class="row">
              <div class="col-12">
                @if($errors->any())
                @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
                @endif
                <form action="{{ route('ruangan.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $desc }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="div">
                            <div class="section-title mt-0">Kode Ruangan</div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="kode_ruangan">
                            </div>
                        </div>
                        <div class="div">
                            <div class="section-title mt-0">Nama Ruangan</div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="nama_ruangan">
                            </div>
                        </div>
                        <div class="div">
                            <div class="section-title mt-0">Lokasi Ruangan</div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="lokasi_ruangan">
                            </div>
                        </div>
                        <div class="div">
                            <div class="section-title mt-0">Info Ruangan</div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="is_active">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mb-3 text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a class="btn btn-danger" href="{{ route('ruangan.index') }}">Back</a>
                        </div>
                    </div>
                  </div>
                </form>
            </div>
@endsection