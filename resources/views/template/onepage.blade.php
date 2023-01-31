<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout Vertical 1 Column - Mazer</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">
    @stack('css')
</head>

<body>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <div class="row">
                <div class="col-6">
                    <div class="navbar-brand ms-4">
                        <img src="{{ asset('assets/images/logo/logo.svg') }}">

                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('logout-petugas') }}" class="text-danger"><i class="bi bi-box-arrow-left"></i> Logout</a>
                    </div>
            </div>
            
        </div>
    </nav>
    


@yield('content')

@stack('js')

</body>

</html>
