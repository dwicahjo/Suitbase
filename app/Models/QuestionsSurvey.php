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

        
}