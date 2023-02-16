@extends('template.onepage')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-md-8">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">{{ __('Bid Barang Yang Akan Di Lelang') }}</h4>
          </div>
          <div class="card-content">
              <div class="card-body">
                  <form class="form" method="POST" action="{{ route('lelang.masyarakat.penawaran.store', $lelangs->id) }}" data-parsley-validate>
                    @csrf
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group mandatory">
                          <label for="barangs_id" class="form-label">{{ __('Nama Barang') }}</label>
                          <input type="text" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" data-parsley-required="true" value="{{ $lelangs->barang->nama_barang }}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group mandatory">
                                <label for="tanggal" class="form-label">{{ __('Tanggal Lelang') }}</label>
                                  <input type="date" id="tanggal_lelang" class="form-control " name="tanggal_lelang" data-parsley-required="true" value="{{ $lelangs->tanggal_lelang }}"disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group mandatory">
                                <label for="harga_awal" class="form-label">{{ __('Harga Awal') }}</label>
                                <input type="text" id="harga_awal" class="form-control" placeholder="Input Harga, Hanya Angka" name="harga_awal" data-parsley-required="true" value="@currency($lelangs->barang->harga_awal)" disabled>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                          <div class="form-group mandatory">
                              <label for="harga_penawaran" class="form-label">{{ __('Harga Bid') }}</label>
                              <input type="text" id="harga_penawaran" class="form-control" placeholder="Input Harga, Hanya Angka" name="harga_penawaran" data-parsley-required="true" value="{{ old('harga_penawaran') }}">
                          </div>
                          @error('harga_penawaran')
                            <div class="aler alert-danger" role="alert">{{ $message }}</div>
                          @enderror
                      </div>
                      </div>
                      <div class="row">
                          <div class="col-6 d-flex justify-content-start">
                              <a href="{{ route('barang.index') }}" class="btn btn-outline-info me-1 mb-1">
                                {{ __('Kembali') }}
                              </a>
                          </div>
                        <div class="col-6 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">
                              {{ __('Submit') }}
                            </button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                              {{ __('Reset') }}
                            </button>
                        </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card">
        <div class="card-body">
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection