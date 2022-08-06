<?php

namespace App\Models;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Choice extends Model
{
    use HasFactory;

    protected $table = 'choices';

    protected $fillable = [
        'choice',
        'quiz_id'
    ];

    public function quiz(){
        return $this->hasOne(Quiz::class, 'id', 'quiz_id');
    }

    public function answer(){
        return $this->hasOne(Answer::class, 'choice_id');
    }
}
