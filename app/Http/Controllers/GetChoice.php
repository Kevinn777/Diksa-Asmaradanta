<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetChoice extends Controller
{
    public function getChoice($id){
        $choices = Choice::where('quiz_id', $id)->get();
        // return $choices;
        return response()->json($choices);
    }
}
