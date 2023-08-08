<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('doc_title')</title>
</head>
<body>
    <div class="navbar" style="display: flex; gap: 15px; font-size: 24px; margin: 20px 40px; justify-content: center;">
        <a href="/" style="text-decoration: none;">Main</a>
        <a href="/about" style="text-decoration: none;">About</a>
        <a href="/contact" style="text-decoration: none;">Contact</a>
        <a href="/ads" style="text-decoration: none;">Ads</a>
        <a href="/business" style="text-decoration: none;">Business</a>
    </div>
    @yield('content')
</body>
</html>