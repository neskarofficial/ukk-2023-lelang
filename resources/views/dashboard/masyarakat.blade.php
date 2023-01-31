@extends('template.onepage')

@section('content')
    
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h4 class="card-title">{{ __('Welcome ') }}</h4>
                <h5 class="text-muted">{{ Str::title(request()->user()->name) }} {{ __(' | ') }} {{ request()->user()->level }}</h5>
            </div>
        </div>
        
        <div class="card mt-5">
            <div class="card-body">
                <div class="row">
                    <a href="{{ route('lelang.masyarakat.list') }}">List Lelang</a>
                </div>
            </div>
        </div>
    </div>
@endsection