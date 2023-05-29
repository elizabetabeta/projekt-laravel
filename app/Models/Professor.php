<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $table = 'professors';
    protected $fillable = [
        'name', 'surname', 'title',
        'gender'
    ];

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'professor_id');
    }

}
