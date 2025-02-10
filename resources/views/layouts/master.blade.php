@include('layouts.header')

<body>
    <div>
        @include('layouts.top_menu')
        <div class="container">
            @yield('main-content')
        </div>
        @include('layouts.footer')
    </div>
</body>
</html>