@extends("layouts.layout")

@section("doc_title", "Create")

@section("doc_body")
    <h1>Create</h1>
    <form action="/create" method="POST">
        {{-- securizarea site-ului de la Cross Site Request Forgery --}}
        
        {{-- CSRF (Cross-Site Request Forgery) este o vulnerabilitate de securitate a aplicațiilor web, 
        în care un atacator convinge un utilizator autentificat să execute acțiuni nedorite pe o altă aplicație web 
        în care acesta este autentificat, fără știrea sau consimțământul său, prin intermediul trucării cererilor HTTP valide.

        În esență, atacatorul exploatează încrederea dintre utilizator și aplicația web pentru a forța utilizatorul 
        să efectueze acțiuni pe care nu le-a intenționat, cum ar fi trimiterea de fonduri, modificarea setărilor 
        sau alte acțiuni sensibile, ducând la potențiale consecințe grave pentru securitatea și integritatea datelor. --}}
        @csrf
        <input type="text" name="item_name" placeholder="Name">
        {{-- adaugam mesajele de eroare in forma
            (daca avem eraore, mesajul acesteia va aparea intr-un paragraf aflat sub inputul propriu-zis) --}}
        @error("item_name")
            <p class="error">{{ $message }}</p>
        @enderror
        <label for="category">Category</label>
        <select name="item_category" id="category">
            <option value="Auto">Auto</option>
            <option value="Gadget">Gadget</option>
            <option value="Food">Food</option>
        </select>
        @error("item_category")
            <p class="error">{{ $message }}</p>
        @enderror
        <input type="number" name="item_price" placeholder="Price" step="0.01" min="1">
        @error("item_price")
            <p class="error">{{ $message }}</p>
        @enderror
        <button type="submit">Create</button>
    </form>
@endsection