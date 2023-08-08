<!-- composer create-project laravel/laravel name - cream proiect de laravel
cd name - ne ducem la directoriul proiectului
code . - intram in proiectul de laravel cu ajutorul vs code
php artisan serve - lansam proiectul laravel in browser
(copiem adresa: http://127.0.0.1:8000 o inseram in search-bar si avem proiectul curent) -->

<!-- blade - tehnologie de laravel care combina php impreuna cu HTML -->

{{-- php syntax --}}
@php
    $text = "Hello Laravel";
    $age = -25;
    $isRaining = true;
    $a = "";
    $userType = "admin";
    $cars = ["Alfa Romeo", "Skoda", "Honda"];
    $carsAsoc = [
        [
            "brand" => "Alfa Romeo",
            "model" => "Giulia",
            "price" => 50000
        ],
        [
            "brand" => "Skoda",
            "model" => "Kodiaq",
            "price" => 25000
        ],
        [
            "brand" => "Honda",
            "model" => "Civic",
            "price" => 1000
        ],
    ];
@endphp

{{-- header to print a variable syntax --}}
<h1>{{ $text }}</h1>

{{-- if syntax --}}
@if ($age >= 18)
<p>You are mature</p>
@elseif ($age <= 0 || $age >= 100)
<p>Wrong age</p>
@else
<p>You are still young</p>
@endif

{{-- if not in Laravel --}}
@unless (5>10)
<p>Is raining</p>
@endunless

{{-- isset syntax --}}
@isset($a)
<p>A is set</p>
@else
<p>A is not set</p>
@endisset

{{-- empty syntax --}}
@empty($a)
<p>A is empty</p>
@else
<p>A is not empty</p>
@endempty

{{-- switch syntax --}}
@switch($userType)
    @case("admin")
        <p>Hello admin</p>
        @break
    @case("basic")
        <p>Hello user</p>
        @break
    @default
        <p>Hello!</p>
@endswitch

{{-- forearch syntax --}}
@foreach ($cars as $car)
    <p>{{$car}}</p>    
@endforeach

{{-- forearch syntax for an associative table --}}
@foreach ($carsAsoc as $car)
    {{-- if car["brand"] == "Skoda" then we will skip it --}}
    @continue ($car["brand"] == "Skoda")

    @if ($car["price"] < 30000)
        <p>{{$car["brand"]}} {{$car["model"]}}</p>
    @endif

    {{-- if $car["brand"] == "Bugatti" we will stop out foreach cycle --}}
    @break ($car["brand"] == "Bugatti")
@endforeach

{{-- for syntax --}}
@for ($i = 0; $i < 10; $i++)
    <p>{{ $i }}</p>
@endfor

{{-- inline css styling syntax --}}
<h1 @style([
    'background-color: red',
    'color: white'
])>Welcome to my website</h1>