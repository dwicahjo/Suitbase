<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Feedback
 */
class Feedback extends Model
{
    protected $table = 'feedbacks';

    public $timestamps = true;

    protected $fillable = [
        'description',
        'title',
        'is_anonim',
        'employees_id'
    ];

    protected $guarded = [];

        
}