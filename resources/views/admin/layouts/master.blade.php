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
    <script>
    var button = document.querySelector('.hamburger');
    var appDiv = document.querySelector('.app');

    function toggleClass() {
        appDiv.classList.toggle('has-compact-menu');
    }
    button.addEventListener('click', toggleClass);
    </script>
</body>

</html>