<!doctype html>
<html>
<head>
    @include('layouts.partials.head')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @include('layouts.partials.header')
        </div>
        <div id="main" class="row">
            @yield('content')
        </div>
        <div class="row">
            @include('layouts.partials.footer')
        </div>
    </div>
</body>
</html>