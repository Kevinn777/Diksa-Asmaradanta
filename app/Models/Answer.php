<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Choice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';

    protected $fillable = [
        'quiz_id',
        'choice_id',
        'user_id',
        'lisan_answer'
    ];
    
    public function quiz(){
        return $this->hasOne(Quiz::class, 'id', 'quiz_id');
    }
    public function choice(){
        return $this->hasOne(Choice::class, 'id', 'choice_id');
    }

}
