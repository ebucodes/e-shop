@include('layouts.account.head')

<body>
    <main class="wrapper sb-default ecom">
        <!-- Loader -->
        <div id="cr-overlay">
            <div class="loader"></div>
        </div>

        <!-- Header -->
        @include('layouts.account.header')

        {{-- sidebar --}}
        @include('layouts.account.sidebar')
        <!-- Main content -->
        @yield('content')

        @include('layouts.account.footer')
    </main>
    @include('layouts.account.scripts')
</body>

</html>