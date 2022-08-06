<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetAnswered extends Controller
{
    public function getLisan($quiz_id, $user_id){
        $answered = Answer::where('quiz_id', $quiz_id)->where('user_id', $user_id)->first();
        return response()->json($answered);
    }
}
