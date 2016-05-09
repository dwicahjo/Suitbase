<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QuestionsSurvey
 */
class QuestionsSurvey extends Model
{
    protected $table = 'questions_survey';

    public $timestamps = true;

    protected $fillable = [
        'question_type',
        'question',
        'surveys_form_id'
    ];

    protected $guarded = [];

    public function survey_form_id()
    {
        return $this->hasOne('App\Models\SurveysForm', 'id', 'surveys_form_id');
    }
}
