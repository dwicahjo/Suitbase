<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Procurement
 */
class Procurement extends Model
{
    protected $table = 'procurements';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'estimate_price',
        'description',
        'status',
        'employees_id'
    ];

    protected $guarded = [];

        
}