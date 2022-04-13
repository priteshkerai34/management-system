<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class item_images
 * @package App\Models
 * @version April 12, 2022, 12:34 pm UTC
 *
 * @property string $images
 */
class item_images extends Model
{
    use HasFactory;

    public $table = 'item_images';
    

    public $fillable = [
        'images',
        'item_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
