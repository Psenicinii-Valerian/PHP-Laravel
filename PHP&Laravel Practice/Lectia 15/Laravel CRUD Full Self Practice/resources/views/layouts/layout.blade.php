<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('doc_title')</title>
    {{-- css link --}}
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
    <header>
        <div class="links">
            <a href="/">Home</a>
            <a href="/create">Create</a>
            <a href="/update">Update</a>
        </div>
    </header>
    @yield('doc_body')
</body>
</html>