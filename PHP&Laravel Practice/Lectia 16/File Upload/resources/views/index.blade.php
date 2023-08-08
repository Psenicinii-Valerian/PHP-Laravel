@extends('layout')

@section('content')
    {{-- enctype="multipart/form-data" - ne va permite sa lucram cu date de tip fisier --}}
    <form action="/" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button>Upload file</button>
    </form> 
    @foreach ($files as $file)
        <p>{{ $file -> path }}</p>      
        <img src="{{ asset('storage/' . $file->path) }}" alt="Image">
    @endforeach 
    {{ $files -> links() }}
    {{-- pentru a face o paginare cat de cat okay, ne ducem in app -> Providers -> AppServiceProvider.php --}}
    {{-- adaugam package-ul use Illuminate\Pagination\Paginator; --}}
    {{-- si in clasa public function boot(): void in loc de // adaugam Paginator::useBootstrap(); --}}
    {{-- Asadar obtinem --}}
    {{-- 
        public function boot(): void
        {
            Paginator::useBootstrap();
        } 
    --}}
    {{-- de asemenea in layout indicam linkurile --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script> --}}

    {{-- php artisan make:migration create_files_table(numele fisierului) - comanda ce ne permite sa 
            cream un nou fiser de migrare --}}
    {{-- acesta va avea path-ul database -> migrations -> data_crearii_numele_fisierului  --}}
    
    {{-- php artisan storage:link - comanda ce crează un link simbolic între directorul public al aplicației și 
            directorul de stocare, permițând accesul public la fișierele stocate în directorul de stocare. --}}
    
    {{-- php artisan migrate - Comanda ce rulează migrările definite în aplicație Laravel, 
            actualizând structura bazei de date în conformitate cu schimbările specificate în codul migrărilor. 
            La fiecare migrare insa, informatia din baza de date se va sterge.
            Aceasta putem sa evitam prin crearea unui back-up (preventiv).
    --}}
   
    {{-- composer require laravel/jetstream - Această comandă instalează pachetul Laravel Jetstream, 
            care oferă un set de funcționalități pentru gestionarea autentificării și abonamentelor în aplicațiile web Laravel.--}}
    
    {{-- php artisan jetstream:install livewire - Această comandă instalează pachetul Laravel Jetstream cu setarea frontend-ului Livewire, 
            ceea ce permite crearea aplicațiilor web interactive cu Livewire în cadrul unui proiect Laravel.--}}
    
    {{-- npm i - comanda utilizată pentru a instala toate pachetele necesare definite în fișierul "package.json" într-un proiect Node.js --}}
    
    {{-- npm run dev - comanda ce este folosită în proiectele Node.js și în special în proiectele dezvoltate cu framework-ul Laravel 
            (sau altele similare) pentru a compila și a optimiza resursele frontend, cum ar fi fișierele CSS și JavaScript, 
            înainte de a le folosi în mediul de dezvoltare --}}

    {{-- daca ne da o eroare referitor la table(BD) in web, dam Run Migrations ce ne va rezolva automat problema --}}
    {{-- php artisan route:list -  comanda de consola care ne permite sa vedem toate rutele in proiect  --}}
    {{-- !!!Paginile de login, register le putem vedea in resources -> views -> auth --}}

    {{-- In spatele autentificarii(login, register) sta baza de date pe care o putem gasi dupa path-ul --}}
    {{-- database -> migrations -> 2014_10_12_000000_create_users_table.php --}}
    {{-- *Alte tabele din baza de date de asemenea pot fi gasite acolo*  --}}
@endsection