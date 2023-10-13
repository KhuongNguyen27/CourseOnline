<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'sections';
    public function course()
    {
        return $this->belongTo(Course::class,'course_id','id');
    }

    public function lession()
    {
        return $this->hasMany(Lession::class,'section_id','id');
    }
}


