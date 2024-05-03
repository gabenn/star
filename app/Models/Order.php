<?php

namespace App\Models;

use App\Enums\CurrencyEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'order_type_id',
        'name',
        'price',
        'currency',
        'description',
        'customer_id',
        'order_datetime'
    ];

    public function orderType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(OrderType::class);
    }

    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function getCurrencySymbol(): string
    {
        return CurrencyEnum::getCurrencySymbol($this->currency);
    }
}
