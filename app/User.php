<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gender','religion','address','birth_date','birth_place','phone','ktp_id','ktp_address','KK','CV','ijazah','NPWP','KTP','departments_id','divisions_id','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','overtime_hours','number_leave','last_avg_score'
    ];
}
