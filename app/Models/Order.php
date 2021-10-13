<?php

namespace App\Models;
use App\Models\User;
use App\Models\Priority;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'user_id',
        'priority_id',
        'delivery_date'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'priority_id' => 'integer',
        'delivery_date' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'nullable',
        'priority_id' => 'nullable',
        'delivery_date' => 'nullable|datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id');
    }

    public function orderProducts()
    {
        return $this->hasMany(\App\Models\OrderAndProduct::class, 'order_id');
    }
}