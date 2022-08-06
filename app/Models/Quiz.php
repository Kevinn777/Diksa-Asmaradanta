<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';

    protected $fillable = [
        'title',
        'gambar',
        'quiz_model',
        'exam_id'
    ];

    public function choice(){
        return $this->hasMany(Choice::class, 'quiz_id', 'id');
    }

    public function answer(){
        return $this->hasOne(Answer::class, 'quiz_id', 'id');
    }
}
