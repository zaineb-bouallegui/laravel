<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $table ='produits';
    protected $primarykey = 'id';
    protected $fillable = ['nom','description','prix','quantite','image', 'category_id'];
    
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }
}
