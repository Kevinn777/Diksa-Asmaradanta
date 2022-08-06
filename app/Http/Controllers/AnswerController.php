<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Answer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // $admins = User::where('role', 'admin')->where('name', 'like', '%' . $request->searchUser . '%')->get();
        // return $admins;
        // $answers = User::with('answer.choice')->get();
        // return $answers;
        if($request->searchUser){
            $users = User::where('role', 'user')->where('name', 'like', '%' . $request->searchUser . '%')->get();
            $admins = User::where('role', 'admin')->get();

            return view('admin.answer', compact(['users', 'admins']));
        } else if($request->searchAdmin){
            $users = User::where('role', 'user')->get();
            $admins = User::where('role', 'admin')->where('name', 'like', '%' . $request->searchAdmin . '%')->get();

            return view('admin.answer', compact(['users', 'admins']));
        } else {
            $users = User::where('role', 'user')->get();
            $admins = User::where('role', 'admin')->get();
            
            return view('admin.answer', compact(['users', 'admins']));
        }
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
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exams = Exam::with(['quiz.choice.answer' => function($q) use ($id){
            $q->where('answers.user_id', $id);
        }, 'quiz.answer'])->orderBy('tahap', 'ASC')->get();

        // return $exams;

        // $user_data = User::with(['answer.quiz', 'answer.choice'])->where('id', $id)->first();
        return view('admin.detail-answer', compact(['exams']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();

        return response()->json($user);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        if($request->password != ''){
            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        }

        if ($request->password == ''){
            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        }


        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
    }
}
