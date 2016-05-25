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
        'date',
        'title',
        'estimate_price',
        'description',
        'status',
        'employees_id'
    ];

    protected $guarded = [];

    public function employee() 
    {
        return $this->hasOne('App\Models\User', 'id', 'employees_id');
    }
}
