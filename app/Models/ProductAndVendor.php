<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAndVendor extends Model
{
    use HasFactory;

    public $table = 'products_and_vendors';

    public $fillable = [
        'product_id',
        'vendor_id'
    ];

    protected $casts = [
        'product_id' => 'integer',
        'vendor_id' => 'integer'
    ];

    /**s
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'nullable',
        'vendor_id' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function vendor()
    {
        return $this->belongsTo(\App\Models\Vendor::class, 'vendor_id');
    }
}