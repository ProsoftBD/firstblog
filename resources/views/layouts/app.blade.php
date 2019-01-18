<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
            {{-- {{ config('app.name', 'Laravel') }} --}}
            {{ $settings->site_name }}
    </title>

    <link rel="shortcut icon" href="{{ asset($settings->favicon) }}" type="image/x-icon">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    @yield('styles')


</head>
<body>
    <div id="app">
        @include('admin.navs.topNav')
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    @if (Auth::check())
                        <div class="col-lg-4">
                            @include('admin.navs.leftNav')
                        </div>
                    @endif
                    <div class="col-lg-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
    </script>

    @yield('scripts')
</body>
</html>
