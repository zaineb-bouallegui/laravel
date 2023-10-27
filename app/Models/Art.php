<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    use HasFactory;
    protected $table = 'art';
    protected $primarykey = 'id';
    protected $fillable =['name','description','image','style_id'];

    public function style(){
        return $this->belongsTo(style::class,'style_id');
    }
}
