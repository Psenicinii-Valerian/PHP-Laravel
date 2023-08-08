@foreach ($dinosaurs as $dinosaur)
    <a href="{{ "/dinosaur/" .$dinosaur->id }}" class="dinosaur">
        <h2>Species: {{ $dinosaur->species }}</h2>
        <p>Type: {{ $dinosaur->type }}</p>
        <p>Height: {{ $dinosaur->height }}m</p>
        <p>Weight: {{ $dinosaur->weight }}kg</p>
        <p>Color: {{ $dinosaur->color }}</p>
        <img src="{{ $dinosaur->img }}" alt="Dinosaur Image">
    </a>
@endforeach