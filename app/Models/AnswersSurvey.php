<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnswersSurvey
 */
class AnswersSurvey extends Model
{
    protected $table = 'answers_survey';

    public $timestamps = true;

    protected $fillable = [
        'surveys_id',
        'question_id',
        'answer'
    ];

    protected $guarded = [];

    public function survey()
    {
        return $this->hasOne('App\Models\Survey', 'id', 'surveys_id');
    }

    public function question()
    {
        return $this->hasOne('App\Models\QuestionsSurvey', 'id', 'question_id');
    }

}
