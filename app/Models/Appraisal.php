<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Appraisal
 */
class Appraisal extends Model
{
    protected $table = 'appraisals';

    public $timestamps = true;

    protected $fillable = [
        'status',
        'average_score',
        'comment',
        'employees_id',
        'divisions_id',
        'appraisals_template_id',
        'supervisors_id'
    ];

    protected $guarded = [];

    public function division()
    {
        return $this->hasOne('App\Models\Division', 'id', 'divisions_id');
    }
    public function employee()
    {
        return $this->hasOne('App\Models\User', 'id', 'employees_id');
    }
    public function appraisalsTemplate()
    {
        return $this->hasOne('App\Models\AppraisalsTemplate', 'id', 'appraisals_template_id');
    }
    public function supervisor()
    {
        return $this->hasOne('App\Models\Supervisor', 'supervisors_id', 'supervisors_id');
    }

    public function answer()
    {
        return $this->hasMany('App\Models\Answer', 'appraisals_id');
    }
}
