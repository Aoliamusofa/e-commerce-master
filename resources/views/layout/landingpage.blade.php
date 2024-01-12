<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assetlandingpage') }}/css/bootstrap.min.css" rel="stylesheet">

    <title>{{ $title ?? 't-shirt' }}</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            {{-- brand nav --}}
            <a class="navbar-brand text-primary" href="/">
                <img src="{{asset('assets')}}/t-shirt.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                T-SHIRT
            </a>
            {{-- end-brand nav --}}

            {{-- button togler responsive --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- end-button togler responsive --}}

            {{-- menu nav --}}
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-primary" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-primary" aria-current="page" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-primary" aria-current="page" href="/register">Register</a>
                    </li>
                </ul>
            </div>
            {{-- end-menu nav --}}
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('assetlandingpage') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assetlandingpage') }}/js/popper.min.js"></script>
</body>

</html>