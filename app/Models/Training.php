<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Training
 */
class Training extends Model
{
    protected $table = 'trainings';

    public $timestamps = true;

    protected $fillable = [
        'date_start',
        'date_end',
        'title',
        'estimate_price',
        'description',
        'status',
        'employees_id'
    ];

    protected $guarded = [];

        
}