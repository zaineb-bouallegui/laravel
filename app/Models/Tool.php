<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tool extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'description', 'prix', 'categorie','image','stock_id',
    ];

// Tool.php
public function stock()
{
    return $this->belongsTo(Stock::class);
}


}