<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['nom','description'];

    public function produits()
{
    return $this->hasMany(Produit::class, 'category_id');
}

}