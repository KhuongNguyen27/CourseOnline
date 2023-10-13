<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lession extends Model
{
    use HasFactory;
    protected $table = 'lessions';
    public function section()
    {
        return $this->belongTo(Section::class,'section_id','id');
    }
}
