<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Quiz;
use App\Models\Choice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->searchQuiz){
            $quizzes = Quiz::where('exam_id', $request->exam_id_search)->where('title', 'like', '%' . $request->searchQuiz . '%')->get();
        } else {
            $quizzes = Quiz::where('exam_id', $request->exam_id_search)->get();
        }
        $id = $request->exam_id_search;
        return view('admin.detail-exam', compact(['quizzes', 'id']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->quiz_model == 'pilihan_ganda'){
            $validation = Validator::make($request->all(), [
                'title' => 'required',
                'choice' => 'required',
                'gambar' => 'mimes:jpeg,jpg,png'
            ]);
        } else {
            $validation = Validator::make($request->all(), [
                'title' => 'required',
                'gambar' => 'mimes:jpeg,jpg,png'
            ]);
        }

        if($validation->fails()){
            return response()->json(['errors' => $validation->errors()]);
        }

        if($request->id){
            if($request->gambar){
                $gambar = time() . '.' . $request->gambar->extension();
                $request->gambar->move(public_path('assets/images/'), $gambar);

                $quiz = Quiz::where('id', $request->id)->update([
                    'title' => $request->title,
                    'exam_id' => $request->exam_id,
                    'gambar' => $gambar
                ]);
    
                Choice::where('quiz_id', $request->id)->delete();
                if($request->quiz_model == 'pilihan_ganda'){
                    foreach($request->choice as $choice){
                        Choice::create([
                            'choice' => $choice,
                            'quiz_id' => $request->id
                        ]);
                    }
                }
                
            } else{
                $quiz = Quiz::where('id', $request->id)->update([
                    'title' => $request->title,
                    'exam_id' => $request->exam_id
                ]);


                Choice::where('quiz_id', $request->id)->delete();
                if($request->quiz_model == 'pilihan_ganda'){
                    foreach($request->choice as $choice){
                        Choice::create([
                            'choice' => $choice,
                            'quiz_id' => $request->id
                        ]);
                    }
                }
            }
        } else{
            if($request->gambar){
                $gambar = time() . '.' . $request->gambar->extension();
                $request->gambar->move(public_path('assets/images/'), $gambar);

                $quiz = Quiz::create([
                    'title' => $request->title,
                    'exam_id' => $request->exam_id,
                    'gambar' => $gambar
                ]);
                
                if($request->quiz_model == 'pilihan_ganda'){
                    foreach($request->choice as $choice){
                        $choices = [
                            'choice' => $choice,
                            'quiz_id' => $quiz->id
                        ];
                        Choice::create($choices);
                    }
                }

            } else {
                $quiz = Quiz::create([
                    'title' => $request->title,
                    'exam_id' => $request->exam_id
                ]);
    
                if($request->quiz_model == 'pilihan_ganda'){
                    foreach($request->choice as $choice){
                        $choices = [
                            'choice' => $choice,
                            'quiz_id' => $quiz->id
                        ];
                        Choice::create($choices);
                    }
                }
            }
        }

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::where('id', $id)->first();
        return response()->json($quiz);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Quiz::where('id', $id)->delete();
        Choice::where('quiz_id', $id)->delete();
    }
}
