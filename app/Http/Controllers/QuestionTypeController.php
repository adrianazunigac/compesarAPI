<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Modelo
use App\Models\QuestionTypes;

class QuestionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $QuestionTypes = QuestionTypes::all();

        return response()->json([
            'status' => 'ok',
            'data' => $QuestionTypes
        ]);
    }
}
