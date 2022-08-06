<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Quiz;
use App\Models\Answer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestPsikologController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {   
        
        $tahap = Exam::orderBy('tahap', 'ASC')->get();
        return view('user.tes-psikologi', compact('tahap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return $request->quiz_id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $answered = Answer::where('quiz_id', $request->quiz_id)->where('user_id', $request->user_id)->first();
        if(!$answered){
            Answer::create([
                'choice_id' => $request->choice_id,
                'quiz_id' => $request->quiz_id,
                'lisan_answer' => $request->lisan_answer,
                'user_id' => $request->user_id
            ]);
            return response()->json('data di buat');
        } else {
            Answer::where('user_id', $request->user_id)->where('quiz_id', $request->quiz_id)->update([
                'choice_id' => $request->choice_id,
                'lisan_answer' => $request->lisan_answer,
            ]);
            return response()->json('data di update');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tahap = Exam::where('id', $id)->first();
        // $quizzes = Quiz::with('choice.answer')->orderBy('created_at', 'DESC')->where('exam_id', $id)->paginate(1);
        $exam_id = $id;

        $quizzes = Quiz::with(['choice.answer' => function($q) use ($id){
            $q->where('answers.user_id', Auth::user()->id);
        }])->orderBy('created_at', 'ASC')->where('exam_id', $id)->paginate(1);
        
        // return $quizzes;
        return view('user.quiz', compact(['tahap', 'quizzes', 'exam_id']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
