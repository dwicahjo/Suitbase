<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OptionsSurvey
 */
class OptionsSurvey extends Model
{
    protected $table = 'options_survey';

    public $timestamps = true;

    protected $fillable = [
        'question_id',
        'option'
    ];

    protected $guarded = [];

        
}