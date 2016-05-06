<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Aeaf
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

    public function employee()
    {
        return $this->belongsTo('App\Models\User', 'employees_id');
    }
}
