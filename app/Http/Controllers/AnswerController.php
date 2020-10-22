<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Modelo
use App\Models\Answer;

class AnswerController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        foreach ($request->question_answer as $key => $value)
        {
            $Answer = new Answer();
                $Answer->user_id = $request->user_id;
                $Answer->form_id = $request->form_id;
                $Answer->question_id = $key;
                $Answer->answer = $value;
            if(!$Answer->save())
            {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Ha ocurrido un error al guardar las respuestas'
                ]);
                
            }
        }
        return response()->json([
            'status' => 'ok',
            'message' => 'Se guardo las respuestas'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Answers = Answer::with(['user', 'form', 'question'])->where('form_id', $id)->get();

        return response()->json([
            'status' => 'ok',
            'data' => $Answers
        ]);
    }

}
