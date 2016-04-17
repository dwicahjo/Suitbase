<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AppraisalsTemplate
 */
class AppraisalsTemplate extends Model
{
    protected $table = 'appraisals_template';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'date_start',
        'date_end',
        'divisions_id'
    ];

    protected $guarded = [];

    public function division()
    {
        return $this->hasOne('App\Models\Division', 'id', 'divisions_id');
    }
}
