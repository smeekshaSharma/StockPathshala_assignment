<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }
        .shimmer {
            animation: shimmer 2s infinite linear;
            background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
            background-size: 1000px 100%;
            position: relative;
        }
        .shimmer-text { height: 20px; margin-bottom: 10px; border-radius: 4px; }
        .shimmer-image { height: 200px; width: 100%; margin-bottom: 10px; border-radius: 4px; }

    .logo-img {
        width: 220px;
        height: 50px;
    }

    @media (max-width: 767.98px) {
        .logo-img {
            width: 130px; 
            height: 35px; 
        }
    }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/stockpathshala.png') }}" alt="StockPathshala Logo" class="logo-img">
        </a>
    </div>
</nav>

    <div class="content">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
