<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{ 
    use HasFactory;


    use HasFactory;

    protected $fillable = [
        'name',      // Nom du stock
        'quantity',  // Quantité en stock
        'location',  // Emplacement du stock
    ];


    // Stock.php
public function tools()
{
    return $this->hasMany(Tool::class);
}




}
