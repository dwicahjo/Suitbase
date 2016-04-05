<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Remote
 */
class Remote extends Model
{
    protected $table = 'remotes';

    public $timestamps = true;

    protected $fillable = [
        'date_start',
        'date_end',
        'description',
        'status',
        'employees_id'
    ];

    protected $guarded = [];

        
}