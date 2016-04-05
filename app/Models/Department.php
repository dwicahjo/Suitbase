<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 */
class Department extends Model
{
    protected $table = 'departments';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'companies_id',
        'employees_id'
    ];

    protected $guarded = [];

        
}