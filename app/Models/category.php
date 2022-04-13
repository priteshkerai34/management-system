<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class category
 * @package App\Models
 * @version April 12, 2022, 7:38 am UTC
 *
 * @property string $Name
 */
class category extends Model
{
    public $table = 'categories';
    

    public $fillable = [
        'Name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Name' => 'required'
    ];

    
}
