<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectureStudent extends Model
{
    use HasFactory;

    protected $table = 'lectures_students';
    protected $fillable = [
        'student_id', 'lecture_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class, 'lecture_id');
    }

}
