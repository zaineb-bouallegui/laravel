<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class style extends Model
{
    use HasFactory;
    protected $table = 'style';
    protected $primarykey = 'id';
    protected $fillable =['nameStyle','periode','artiste'];
}
