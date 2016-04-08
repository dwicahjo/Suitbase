<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 */
class User extends Model
{
    protected $table = 'users';

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
        'KTP',
        'remember_token',
        'departments_id',
        'divisions_id'
    ];

    protected $guarded = [];

        
}