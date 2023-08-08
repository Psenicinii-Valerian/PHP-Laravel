<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // php artisan make:migration create_files_table - comanda ce ne permite sa cream un nou fiser de migrare(precum acesta)
    // function up() - functie speciala pentru crearea unui tabel in BD, ce o vom apela ulterior
    // *o vom apelat automat prin scrierea in consola a functiei: php artisan migrate*
    // php artisan migrate - comanda ce ne permite sa rulam migratiile ce tin de BD din Laravel
    public function up() {
        // files - denumirea tabelului ce il vom crea
        // Blueprint $table - Reprezinta schema tabelului pe baza caruia vom defini campurile  pe care dorim sa le cream in acesta
        Schema::create("files", function(Blueprint $table) {
            // campurile tabelului pe care dorim sa le cream
            // id(), timespamps() - campuri ce vor primi valori automate
            $table -> id();
            $table -> string("path");
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_files');
    }
};
