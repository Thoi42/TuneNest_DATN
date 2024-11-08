<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('user.layouts.component.head')
</head>

<body class="gradient-bg">
    @include('user.layouts.component.scg')
    {{-- <style>
        #header {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .logo__image {
            max-width: 220px;
        }
    </style> --}}


    {{-- header mobile --}}
    @include('user.layouts.component.header-mobile')
    {{-- header --}}
    @include('user.layouts.component.header')

    {{-- Nội dung --}}
    @yield('content') 


    <hr class="mt-5 text-secondary" />

    @include('user.layouts.component.footer')

    @include('user.layouts.component.footer-mobile')


    {{-- <div id="scrollTop" class="visually-hidden end-0"></div>
    <div class="page-overlay"></div> --}}
    {{-- mã script --}}
    @include('user.layouts.component.script')
    
</body>

</html>
