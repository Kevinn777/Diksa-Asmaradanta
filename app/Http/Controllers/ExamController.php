<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->searchExam){
            $exams = Exam::with('quiz.choice')->where('title', 'like', '%' . $request->searchExam . '%')->orderBy('tahap', 'ASC')->get();
        } else {
            $exams = Exam::with('quiz.choice')->orderBy('tahap', 'ASC')->get();
        }
        // return $exams;
        return view('admin.exam', compact('exams'));
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
        $validation = Validator::make($request->all(), [
            'tahap' => 'required',
            'title' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpeg,jpg,png'
        ]);

        if($validation->fails()){
            return response()->json(['errors' => $validation->errors()]);
        }

        if($request->id){
            if ($request->gambar){
                $gambar = time() . '.' . $request->gambar->extension();
                $request->gambar->move(public_path('assets/images/'), $gambar);

                Exam::where('id', $request->id)->update([
                    'gambar' => $gambar,
                    'tahap' => $request->tahap,
                    'title' => $request->title,
                    'deskripsi' => $request->deskripsi
                ]);

                return response()->json(['success' => true]);
            } else {
                Exam::where('id', $request->id)->update([
                    'tahap' => $request->tahap,
                    'title' => $request->title,
                    'deskripsi' => $request->deskripsi
                ]);

                return response()->json(['success' => true]);
            }
        } else {
            if ($request->gambar){
                $gambar = time() . '.' . $request->gambar->extension();
                $request->gambar->move(public_path('Assets/images/'), $gambar);

                Exam::create([
                    'gambar' => $gambar,
                    'tahap' => $request->tahap,
                    'title' => $request->title,
                    'deskripsi' => $request->deskripsi
                ]);

                return response()->json(['success' => true]);
            } else {
                Exam::create([
                    'tahap' => $request->tahap,
                    'title' => $request->title,
                    'gambar' => '1657603759.png',
                    'deskripsi' => $request->deskripsi
                ]);

                return response()->json(['success' => true]);
            }
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
        $quizzes = Quiz::with('choice')->where('exam_id', $id)->get();
        // return $quizzes;
        return view('admin.detail-exam', compact(['quizzes', 'id']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::where('id', $id)->first();

        return response()->json($exam);
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
        Exam::where('id', $id)->first()->delete();
    }
}
