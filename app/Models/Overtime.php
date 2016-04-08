<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Overtime
 */
class Overtime extends Model
{
    protected $table = 'overtimes';

    public $timestamps = true;

    protected $fillable = [
        'date',
        'time_start',
        'time_end',
        'total_hours',
        'description',
        'status',
        'employees_id'
    ];

    protected $guarded = [];

        
}