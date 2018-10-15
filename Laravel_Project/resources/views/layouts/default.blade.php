<!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<head>
    @include('includes.header')
</head>

<main role="main">
    @yield('content')
    <footer class="row">
        @include('includes.footer')
    </footer>

</main>

</body>
</html>
