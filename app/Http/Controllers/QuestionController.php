<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Modelo
use App\Models\Question;
use App\Models\QuestionOption;

class QuestionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Question = new Question();
            $Question->form_id = $request->form_id;
            $Question->description = $request->description;
            $Question->question_type_id = $request->question_type_id;
        
        if($Question->save())
        {
            //Si el tipo de opcion es multiple se guardan las multiples opciones en la tabla correspondiente
            if($request->question_type_id==5)
            {       
                for ($i=0; $i < count($request->question_option_description); $i++)
                {
                    $QuestionOption = new QuestionOption();
                        $QuestionOption->question_id = $Question->id;
                        $QuestionOption->description = $request->question_option_description[$i];
                        
                    if(!$QuestionOption->save())
                    {
                        return response()->json([
                            'status' => 'ok',
                            'message' => 'Ocurrio un error al guardar las opciones de respuesta'
                        ]);
                    }
                }
            }

            return response()->json([
                'status' => 'ok',
                'message' => 'La pregunta ha sido guardada'
            ]);
        }
        else
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Ha ocurrido un error al guardar la pregunta'
            ]);
        }  
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
        $Question = Question::find($id);
            $Question->form_id = $request->form_id;
            $Question->description = $request->description;
            $Question->question_type_id = $request->question_type_id;
        
        if($Question->save())
        {
            //Si el tipo de opcion es multiple se guardan las multiples opciones en la tabla correspondiente
            if($request->question_type_id==5)
            {       
                for ($i=0; $i < count($request->question_option_description); $i++)
                {
                    $QuestionOption = QuestionOption::find($request->question_option_id[$i]);
                        $QuestionOption->description = $request->question_option_description[$i];
                        
                    if(!$QuestionOption->save())
                    {
                        return response()->json([
                            'status' => 'ok',
                            'message' => 'Ocurrio un error al actualizar las opciones de respuesta'
                        ]);
                    }
                }
            }

            return response()->json([
                'status' => 'ok',
                'message' => 'La pregunta ha sido actualizada'
            ]);
        }
        else
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Ha ocurrido un error al actualizar la pregunta'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //Se elimina el detalle de la pregunta
        $QuestionOption = QuestionOption::where('question_id', $id);        
        if($QuestionOption->count() > 0)
        {

            if(!$QuestionOption->delete())
            {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Ha ocurrido al eliminar las opciones de respuesta'
                ]);             
            }
        }

        //Se elimina la pregunta
        $Question = Question::find($id);             
        if($Question->delete())
        {
            return response()->json([
                'status' => 'ok',
                'message' => 'Se ha eliminado correctamente la pregunta'
            ]);
        }
        else
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Ha ocurrido al eliminar la pregunta'
            ]);
        } 
    }
}
