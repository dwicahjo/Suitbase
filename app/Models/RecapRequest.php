<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * Class RecapRequest
 */
class RecapRequest extends Model
{
    protected $table = 'recap_request';

    public $timestamps = true;

    protected $fillable = [
        'department',
        'total_leaves',
        'total_remotes',
        'total_trainings',
        'total_procurements',
        'period'
    ];

    protected $guarded = [];

    public static function isExistRow($column, $comparator)
    {
        return DB::table('recap_request')->where($column,'=',$comparator)->exists();
    }
}