<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// php artisan make:model Item 
class Item extends Model
{
    use HasFactory;

    // salvam tabelul nostru din BD ca variabila $items 
    protected $table = "items";

    // schimbam denumirea cheii primare (care este pusa by default = "id") in "item_id" 
    // deoarece asta este denumirea cheii noastre primare a tabelului items din baza de date  
    protected $primaryKey = "item_id";

    // salvam valorile ce pot fi completate cu informatie(fillable) ca tablou in variabila $fillable
    protected $fillable = ["item_name", "item_category", "item_price"];

    // variabila ce ne va permite sa facem create-ul neglijand timpul cand este efectuata operatia
    // (cele 2 coloane - updated_at si created_at nu vor mai fi generate automat si nu vor provoca erori)
    public $timestamps = false;
}
