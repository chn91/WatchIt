<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Watch It</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/master.css') }}">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    @include('partials.nav')
    <div class="container-fluid">
        @yield('content')
    </div>
</body>
</html>