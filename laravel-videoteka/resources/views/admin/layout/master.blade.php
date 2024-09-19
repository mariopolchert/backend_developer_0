<html lang="en">
    <head>
        @include('admin.layout.head')
    </head>
    <body>
        <div class="page-wrapper d-flex">
    
            @include('admin.layout.sidebar')
            
            <div class="content d-flex flex-column flex-grow-1">
                @include('admin.layout.nav')

                @include('admin.layout.messages')

                <main class="container my-3 d-flex flex-column flex-grow-1">
                    @yield('content')
                </main>

                <footer class="py-3">
                    @include('admin.layout.footer')
                </footer>
            </div>
        </main>
        @include('admin.layout.footer-scripts')
    </body>
</html>