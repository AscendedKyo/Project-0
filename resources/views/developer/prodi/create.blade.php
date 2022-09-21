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
                <form action="{{ route('prodi.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $desc }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="div">
                            <div class="section-title mt-0">Nama Prodi</div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="nama_prodi">
                            </div>
                        </div>
                        <div class="div">
                            <div class="section-title mt-0">Nama Kaprodi</div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="nama_kaprodi">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mb-3 text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a class="btn btn-danger" href="{{ route('prodi.index') }}">Back</a>
                        </div>
                    </div>
                  </div>
                </form>
            </div>
@endsection