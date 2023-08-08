{{-- task --}}
{{-- 3 variabile, verificati var 1 prin unless, var 2 prin empty, var 3 prin switch --}}

@php
    $fruit = "banana";
    $money = 777;
    $name = "Oleg";
@endphp

{{-- @unless = if not --}}
@unless($fruit != "banana")
<h1>This is my first {{$fruit}} task in Laravel</h1>
@endunless

@empty($money)
<p>You've got no money. You're poor!</p>
@else
<p>You've got {{$money}}$. Well done!</p>
@endempty

@switch($name)
    @case("Mihai")
        <p>Zdarova Misha</p>
        @break
    @case("Oleg")
        <p>Privet Alek</p>
        @break
    @default
        <p>You who?</p>   
@endswitch