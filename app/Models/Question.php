<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 */
class Question extends Model
{
    protected $table = 'questions';

    public $timestamps = true;

    protected $fillable = [
        'question_type',
        'question',
        'appraisals_template_id'
    ];

    protected $guarded = [];

    public function appraisals_template_id()
    {
        return $this->hasOne('App\Models\AppraisalsTemplate', 'id', 'appraisals_template_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }
}
