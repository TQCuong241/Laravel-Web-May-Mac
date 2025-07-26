<?php
// app/Models/Order.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Order extends Model
{
    protected $fillable = [
        'user_id', 'total', 'status', 'payment_status', 'payment_ref'
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * Các mục (OrderItem) trong đơn
     */
    public function items(): HasMany
    {
        return $this->hasMany(\App\Models\OrderItem::class);
    }
}
