<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $table = 'levels';
    protected $fillable = [
        'name',
        'level'
    ];
    public function course()
    {
        return $this->hasOne(Course::class,'level_id','id');
    }
}
