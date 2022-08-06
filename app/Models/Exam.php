<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Quiz;
use App\Models\Choice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exams';

    protected $fillable = [
        'tahap',
        'gambar',
        'title',
        'deskripsi'
    ];
    
    public function quiz(){
        return $this->hasMany(Quiz::class, 'exam_id');
    }


    public static function boot() {
        parent::boot();

        static::deleting(function($exam) {
            $exam->quiz()->each(function ($quiz){
                $quiz->choice()->each(function ($choice){
                    $choice->delete();
                });
                $quiz->delete();
            });
        });
    }
}
