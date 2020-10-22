<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_id',
        'description',
        'question_type_id'
    ];

    /**
     * Obtener las opciones de pregunta de las tipo 5
     */
    public function QuestionOptions()
    {
        return $this->hasMany('App\Models\QuestionOption');
    }
}
