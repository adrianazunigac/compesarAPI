<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Form;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Forms = Form::all();

        return response()->json([
            'status' => 'ok',
            'data' => $Forms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Form = new Form();
            $Form->name = $request->name;
        
        if($Form->save())
        {
            return response()->json([
                'status' => 'ok',
                'message' => 'El formulario ha sido guardado'
            ]);
        }
        else
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Ha ocurrido un error al guardar el formulario'
            ]);
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
        $Form = Form::with('questions.QuestionOptions')->find($id);

        return response()->json([
                'status' => 'ok',
                'data' => $Form
            ]);
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
        $Form = Form::find($id);
            $Form->name = $request->name;
        if($Form->save())
        {
            return response()->json([
                'status' => 'ok',
                'message' => 'El formulario ha sido actualizado'
            ]);
        }
        else
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Ha ocurrido un error al actualizar el formulario'
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
        Form::destroy($id);

        return response()->json([
            'status' => 'ok',
             'message' => 'Se ha eliminado el formulario'
        ]);
    }
}
