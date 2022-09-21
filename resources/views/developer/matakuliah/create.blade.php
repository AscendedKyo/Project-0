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
                <form action="{{ route('matakuliah.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $desc }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="div">
                            <div class="section-title mt-0">Kode MataKuliah</div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="kode_matakuliah">
                            </div>
                        </div>
                        <div class="div">
                            <div class="section-title mt-0">Nama MataKuliah</div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="nama_matakuliah">
                            </div>
                        </div>
                        <div class="div">
                            <div class="section-title mt-0">Dosen Pengajar</div>
                            <div class="form-group">
                            <select name="dosen_id" id="dosen_id" class="select2 form-select">
                              <option selected value="">Pilih Dosen</option>
                              @foreach ($dosen as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                              @endforeach
                            </select>  
                            </div>
                        </div>
                        <div class="div">
                            <div class="section-title mt-0">Jumlah SKS</div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="jumlah_sks">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mb-3 text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a class="btn btn-danger" href="{{ route('matakuliah.index') }}">Back</a>
                        </div>
                    </div>
                  </div>
                </form>
            </div>
@endsection