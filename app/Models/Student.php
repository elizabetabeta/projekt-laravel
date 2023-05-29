<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'name', 'student_number'
    ];

    public function lecturestudent()
    {
        return $this->hasMany(LectureStudent::class, 'student_id');
    }
}
