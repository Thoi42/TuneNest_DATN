<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('user.layouts.component.head')
</head>

<body class="gradient-bg">
    @include('user.layouts.component.scg')

    @yield('content') 


    <hr class="mt-5 text-secondary" />



    {{-- <div id="scrollTop" class="visually-hidden end-0"></div>
    <div class="page-overlay"></div> --}}
    {{-- mã script --}}
    @include('user.layouts.component.script')
    
</body>

</html>
