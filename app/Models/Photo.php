<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id', 
        'url',         
        'title',      
        'description', 

    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
