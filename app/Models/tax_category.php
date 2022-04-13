<?php

namespace App\Models;

use Eloquent as Model;

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
    

    public $fillable = [
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

    
}
