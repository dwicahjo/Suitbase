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

        
}