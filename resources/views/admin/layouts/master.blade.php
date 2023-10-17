<!DOCTYPE html>
<html lang="en">
@include('admin.includes.header')
<body>
    <div class="app">
        @include('admin.includes.nav')
        @include('admin.includes.sidebar')
        <main class="app-main">
            <div class="wrapper">
                <div class="page">
                    <div class="page-inner">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('admin.includes.footer')
</body>
</html>