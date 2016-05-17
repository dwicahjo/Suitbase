<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SurveysForm
 */
class SurveysForm extends Model
{
    protected $table = 'surveys_form';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'date_start',
        'date_end',
        'divisions_id'
    ];

    protected $guarded = [];

    public function question()
    {
        return $this->hasMany('App\Models\OptionsSurvey','question_id');
    }

    public function division()
    {
        return $this->hasOne('App\Models\Division', 'id', 'divisions_id');
    }
}
