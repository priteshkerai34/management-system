<?php

namespace App\Models;

use Eloquent as Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

/**
 * Class tax_category
 * @package App\Models
 * @version April 12, 2022, 11:17 am UTC
 *
 * @property string $name
 */
class tax_category extends Model
{

    public $table = 'tax_categories';
    
    use LogsActivity;

    public $fillable = [
        'name',
        'tax_rate'
    ];

    protected static $logAttributes = [
        'name',
        'tax_rate'
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
        'name' => 'required',
        'tax_rate' => 'required'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    
}
