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
        <div class="row" style="position:absolute; bottom:0">
            @include('layouts.partials.footer')
        </div>
    </div>
</body>
</html>