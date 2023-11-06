<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'courses';
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class,'course_id','id');
    }
    public function section()
    {
        return $this->hasMany(Section::class,'course_id','id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function level()
    {
        return $this->belongsTo(Level::class,'level_id','id');
    }
}