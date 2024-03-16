@include('layouts.website.head')

<body class="body-bg-6">

    <!-- Loader -->
    <div id="cr-overlay">
        <span class="loader"></span>
    </div>
    {{-- header --}}
    @include('layouts.website.header')
    <!-- Mobile menu -->
    @include('layouts.website.mobile')
    @yield('content')
    @include('layouts.website.footer')
    <!-- Tab to top -->
    <a href="#Top" class="back-to-top result-placeholder">
        <i class="ri-arrow-up-line"></i>
        <div class="back-to-top-wrap">
            <svg viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
    </a>
    @include('layouts.website.js')
</body>

</html>