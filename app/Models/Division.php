<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Division
 */
class Division extends Model
{
    protected $table = 'divisions';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'departments_id'
    ];

    protected $guarded = [];
}