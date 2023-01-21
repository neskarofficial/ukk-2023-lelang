@extends('template.master')

@section('title', 'Data Barang')

@section('subtitle', 'Data Barang Yang Akan Di Lelang')

@section('content')
<section id="multiple-column-form">
  <div class="row match-height">
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">{{ __('Detail Data Barang Yang Akan Di Lelang') }}</h4>
                  <h2 class="fs-6 fw-lighter text-muted font-monospace">
                    {{ __('Created') }} : {{ \Carbon\Carbon::parse($barangs[0]->created_at)->format('j-F-Y : H:i') }}
                  </h2>
              </div>
              <div class="card-content">
                  <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="form-group mandatory">
                                    <label for="nama_barang" class="form-label">{{ __('Nama Barang') }}</label>
                                    <input type="text" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Nama Barang" name="nama_barang" data-parsley-required="true" value="{{ Str::of($barangs[0]->nama_barang)->title() }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group mandatory">
                                    <label for="tanggal" class="form-label">{{ __('Tanggal') }}</label>
                                    <input type="date" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Tanggal" name="tanggal" data-parsley-required="true" value="{{ $barangs[0]->tanggal }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group mandatory">
                                    <label for="harga_awal" class="form-label">{{ __('Harga Awal') }}</label>
                                    <input type="text" id="harga_awal" class="form-control @error('harga_awal') is-invalid @enderror" placeholder="Input Harga, Hanya Angka" name="harga_awal" data-parsley-required="true" value="@currency($barangs[0]->harga_awal)" disabled>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group mandatory">
                                <label for="deskripsi" class="form-label">{{ __('Deskripsi Barang') }}</label>
                                <div class="form-floating">
                                  <textarea class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi Barang" id="deskripsi" name="deskripsi" disabled>{{ Str::of($barangs[0]->deskripsi)->title() }}</textarea>
                                    <label for="deskripsi">{{ __('Jelaskan deskripsi barang minimal 10 karakter') }}</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-6 d-flex justify-content-start">
                                  <a href="{{ route('barang.index') }}" class="btn btn-outline-info me-1 mb-1">
                                    {{ __('Kembali') }}
                                  </a>

                              </div>
                            <div class="col-6 d-flex justify-content-end">
                                <a href="{{ route('barang.edit', $barangs[0]->id) }}" class="btn btn-warning me-1 mb-1">
                                  {{ __('Edit') }}
                                </a>
                            </div>
                          </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection