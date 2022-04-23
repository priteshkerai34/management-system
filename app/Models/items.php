<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

/**
 * Class items
 * @package App\Models
 * @version April 12, 2022, 10:23 am UTC
 *
 * @property string $name
 * @property string $items_url
 * @property string $current_price
 * @property string $Regular_price
 * @property integer $available_stock
 * @property string $description
 * @property boolean $item_visibility
 * @property string $item_tax_category
 */
class items extends Model
{
    use HasFactory;

    public $table = 'items';


    use LogsActivity;


    public $fillable = [
        'name',
        'items_url',
        'current_price',
        'Regular_price',
        'available_stock',
        'description',
        'item_visibility',
        'item_tax_category',
        'category'
    ];

    protected static $logAttributes = [
        'name',
        'items_url',
        'current_price',
        'Regular_price',
        'available_stock',
        'description',
        'item_visibility',
        'item_tax_category',
        'category'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'items_url' => 'string',
        'current_price' => 'string',
        'Regular_price' => 'string',
        'available_stock' => 'integer',
        'item_visibility' => 'string',
        'item_tax_category' => 'string',
        'category' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'items_url' => 'required',
        'current_price' => 'required',
        'Regular_price' => 'required',
        'available_stock' => 'required',
        'item_visibility' => 'required',
        'item_tax_category' => 'required',
        'category' => 'required'
    ];

    public function tax_category()
    {
        return $this->belongsTo(tax_category::class, 'item_tax_category');
    }

    public function images()
    {
        return $this->hasmany(item_images::class,'item_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
