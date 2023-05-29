<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';
    protected $fillable = [
        'name', 'description', 'professor_id',
    ];

    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id');

    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class, 'subject_id');
    }

}
