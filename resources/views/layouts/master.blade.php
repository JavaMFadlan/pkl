<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('layouts.css')
    @livewireStyles
</head>
<body class="sb-nav-fixed">
        
        @include('layouts.navbar')
        @include('layouts.side')
        @yield('content')

        @include('layouts.js')
        @livewireScripts
</body>
</html>