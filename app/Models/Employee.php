<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 */
class Employee extends Model
{
    protected $table = 'employees';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'password',
        'ktp_id',
        'ktp_address',
        'birth_date',
        'birth_place',
        'phone',
        'type',
        'CV',
        'KK',
        'ijazah',
        'religion',
        'gender',
        'overtime_hours',
        'number_leave',
        'last_avg_score',
        'address',
        'NPWP',
        'departments_id',
        'divisions_id'
    ];

    protected $guarded = [];

    public function division()
    {
        return $this->hasOne('App\Models\Division', 'id', 'divisions_id');
    }
}