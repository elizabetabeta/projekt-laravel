<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $table = 'lectures';
    protected $fillable = [
        'time', 'date', 'classroom', 'description',
        'subject_id'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function lecturestudent()
    {
        return $this->hasMany(LectureStudent::class, 'lecture_id');
    }
}
