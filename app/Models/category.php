<?php

namespace App\Models;

use Eloquent as Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

/**
 * Class category
 * @package App\Models
 * @version April 12, 2022, 7:38 am UTC
 *
 * @property string $name
 */
class category extends Model
{
    public $table = 'categories';
    
    use LogsActivity;

    public $fillable = [
        'name'
    ];

    protected static $logAttributes = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
    
}
