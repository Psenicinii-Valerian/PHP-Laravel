<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("doc_title")</title>
</head>
<body style="background-color: rgb(206, 205, 174)">
    <header>
        <a href="/">Main</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
    </header>
    {{-- @yield - parte care va fi ulterior completata cu un content(informatie) --}}
    @yield("content")
</body>
</html>