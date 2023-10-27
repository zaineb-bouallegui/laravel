<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{

    use HasFactory;
    protected $table = 'participation';
    protected $primaryKey='id';
    protected $fillable = ['nom', 'prenom', 'status', 'event_id'];

   
    public function events()
    {
        return $this->hasMany(Event::class,'event_id');
    }

}

