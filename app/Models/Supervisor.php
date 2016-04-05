<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Supervisor
 */
class Supervisor extends Model
{
    protected $table = 'supervisors';

    public $timestamps = true;

    protected $fillable = [
        'supervisors_id',
        'supervisees_id',
        'gap_level'
    ];

    protected $guarded = [];

        
}