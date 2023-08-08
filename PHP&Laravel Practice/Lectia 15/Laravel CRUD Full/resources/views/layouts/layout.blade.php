<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("doc_title")</title>
    {{-- cream in fisierul public un fisier css in care vom crea un file nou style.css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <div class="links">
            <a href="/" style="margin: 10px;">Home</a>
            <a href="/create" style="margin: 10px;">Create</a>
            <a href="/update" style="margin: 10px;">Update</a>
        </div>
        
        <div class="search-box">
            <form action="/" method="GET" class="search">
                <input type="text" name="search" placeholder="Search...">
                <button>Search</button>
            </form>
        </div>
    </header>
    <main>
        @yield("doc_body")
    </main>
</body>
</html>