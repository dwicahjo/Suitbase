<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 */
class Company extends Model
{
    protected $table = 'companies';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'address'
    ];

    protected $guarded = [];

        
}