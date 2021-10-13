<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAndProduct extends Model
{
    use HasFactory;

    public $table = 'orders_and_products';

    public $fillable = [
        'product_id',
        'order_id'
    ];

    protected $casts = [
        'product_id' => 'integer',
        'order_id' => 'integer'
    ];

    /**s
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'nullable',
        'order_id' => 'nullable'
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
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id');
    }
}