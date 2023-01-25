@extends('template.master')
@section('title', 'Data Lelang')

@section('subtitle', 'Data Barang Yang Akan Di Lelang')

@push('css')
  <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
@endpush

@section('content')

<section class="section">
  <div class="card">
      <div class="card-header d-flex justify-content-between">
        <a href="{{ route('lelang.create') }}" class="btn btn-primary btn-md">{{ __('Tambah Lelang') }}</a>
        <a href="/export/guru" class="btn btn-info ml-auto btn-md">{{ __('Export Barang') }}</a>
      </div>
      <div class="card-body">
          <table class="table table-striped" style="width: 100%" id="table1">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Harga Awal</th>
                      <th>Harga Lelang</th>
                      <th>Tanggal Lelang</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @forelse ($lelangs as $lelang)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Str::of($lelang->barang->nama_barang)->title() }}</td>
                    <td>@currency($lelang->barang->harga_awal)</td>
                    <td>@currency($lelang->harga_akhir)</td>
                    <td>{{ \Carbon\Carbon::parse($lelang->tanggal)->format('j-F-Y') }}</td>
                    <td>
                      <span class="badge {{ $lelang->status == 'ditutup' ? 'bg-danger' : 'bg-success' }}">{{ Str::title($lelang->status) }}</span>
                      
                    </td>
                    <td>
                      <div class="d-flex flex-nowrap flex-column flex-md-row justify-center">
                        <form action="{{ route('lelang.destroy', $lelang->id) }}" method="POST">
                        <a href="{{ route('lelang.show', $lelang->id) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                          <i class="bi bi-info-square"></i>
                        </a>
                        <a href="{{ route('lelang.edit', $lelang->id) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                          <i class="bi bi-pencil-square"></i>
                        </a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                            <i class="bi bi-trash"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5" style="text-align: center" class="text-danger">Data lelang Kosong</td>
                  </tr>
                    
                @endforelse

              </tbody>
          </table>
      </div>
  </div>

</section>
@endsection

@push('scripts')
<script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
<script>
  // If you want to use tooltips in your project, we suggest initializing them globally
  // instead of a "per-page" level.
  document.addEventListener('DOMContentLoaded', function () {
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
      })
  }, false);
</script>
@endpush