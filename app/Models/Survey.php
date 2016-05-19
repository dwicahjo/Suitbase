<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Survey
 */
class Survey extends Model
{
    protected $table = 'surveys';

    public $timestamps = true;

    protected $fillable = [
        'status',
        'employees_id',
        'divisions_id',
        'surveys_form_id'
    ];

    protected $guarded = [];

    public function surveyForm()
    {
        return $this->hasOne('App\Models\SurveysForm', 'id', 'surveys_form_id');
    }
    public function employee()
    {
        return $this->hasOne('App\Models\User', 'id', 'employees_id');
    }
    public function answer()
    {
        return $this->hasMany('App\Models\AnswersSurvey', 'surveys_id');
    }
}
