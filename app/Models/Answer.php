<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 */
class Answer extends Model
{
    protected $table = 'answers';

    public $timestamps = true;

    protected $fillable = [
        'appraisals_id',
        'question_id',
        'answer'
    ];

    protected $guarded = [];

    public function question()
    {
        return $this->hasOne('App\Models\Question', 'id', 'question_id');
    }
}
