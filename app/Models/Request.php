<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Request
 */
class Request extends Model
{
    protected $table = 'requests';

    public $timestamps = true;

    protected $fillable = [
        'department',
        'total_leaves',
        'total_remotes',
        'total_trainings',
        'total_procurements',
        'period'
    ];

    protected $guarded = [];

        
}