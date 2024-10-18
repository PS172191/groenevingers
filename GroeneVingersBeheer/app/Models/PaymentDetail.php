<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    protected $fillable = ['order_id', 'amount', 'provider', 'status'];

    public function order()
    {
        return $this->belongsTo(OrderDetail::class);
    }
}
