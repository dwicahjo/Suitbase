<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Leaves
 */
class Leave extends Model
{
    protected $table = 'leaves';

    public $timestamps = true;

    protected $fillable = [
        'date_start',
        'date_end',
        'type',
        'description',
        'status',
        'employees_id'
    ];

    protected $guarded = [];

        
}