<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'answers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_id',
        'user_id',
        'question_id',
        'answer'
    ];


    /**
     * Obtener el usuario quien diligencio la encuesta.
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    /**
     * Obtener datos de la pregunta.
     */
    public function question()
    {
        return $this->hasOne('App\Models\Question', 'id', 'question_id');
    }

    /**
     * Obtener datos del formulario
     */
    public function form()
    {
        return $this->hasOne('App\Models\Form', 'id', 'form_id');
    }
}
