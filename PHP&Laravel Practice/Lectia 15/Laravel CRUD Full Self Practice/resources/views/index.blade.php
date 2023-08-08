@extends('layouts.layout')

@section('doc_title', "Home")
@section('doc_body')
    <script src="{{ asset('/js/app.js')}}" defer></script>
    <script src="{{ asset('/js/auto-submit.js')}}" defer></script>

    @if(session("success_msg"))
        <p id="success">{{ session("success_msg") }}</p>
    @endif

    <form action="/" method="GET"  class="search-sort-filter" id="dinosaur_form">
        {{-- Filter div --}}
        <div class="filter">
            <label for="filter_dino_species">Species:</label>
            <select name="filter_dino_species" id="filter_dino_species">
                <option value="">Any</option>
                @php
                    $species = [];
                @endphp
                @foreach ($dinosaurs as $dinosaur)
                    @if (!in_array($dinosaur->species, $species))
                        <?php $species[] = $dinosaur->species; ?>
                        {{-- @if ($dinosaur->species === request("filter_dino_species"))
                            <option value="{{ $dinosaur->species }}" selected>{{ $dinosaur->species }}</option>
                        @else 
                            <option value="{{ $dinosaur->species }}">{{ $dinosaur->species }}</option>
                        @endif --}}
                        <option value="{{ $dinosaur->species }}" @if ($dinosaur->species === request('filter_dino_species')) selected @endif>
                            {{ $dinosaur->species }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>

        {{-- Search div --}}
        <div class="search">
            <input type="text" id="search_input"
                 @if(!empty(request('search'))) value="{{ request('search') }}" @endif name="search" placeholder="Search...">
            <button>Search</button>
        </div>

        {{-- Sort fdiv --}}
        <div class="sort">
            <label for="sort_dino_param">Sort by:</label>
            <select name="sort_dino_param" id="sort_dino_param">
                <option value="">Any</option>
                @php
                    $filters = ["height asc", "weight asc", "height desc", "weight desc"];
                @endphp
                @foreach($filters as $filter)
                    <option value="{{ $filter }}" @if($filter === request('sort_dino_param')) selected @endif>{{ ucwords($filter) }}</option>
                @endforeach 
            </select>
        </div>
    </form>

    <div class="dinosaurs">
        @foreach ($dinosaursSearched as $dinosaur)
        <a href="{{ "/dinosaur/" .$dinosaur->id }}" class="dinosaur">
            <h2>Species: {{ $dinosaur->species }}</h2>
            <p>Type: {{ $dinosaur->type }}</p>
            <p>Height: {{ $dinosaur->height }}m</p>
            <p>Weight: {{ $dinosaur->weight }}kg</p>
            <p>Color: {{ $dinosaur->color }}</p>
            <img src="{{ $dinosaur->img }}" alt="Dinosaur Image">
        </a>
    @endforeach
    </div>
    {{ $dinosaursSearched->appends(request()->except('page'))->links() }}
@endsection