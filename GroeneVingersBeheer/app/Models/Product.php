<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'suppliers_price',
        'image',
        'color',
        'barcode',
        'height_cm',
        'width_cm',
        'depth_cm',
        'weight_gr',
        'category_id',
    ];

    public function orders()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }

    public function inventory(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Inventory::class);
    }

    public function category()
    {
        // return $this->hasMany(Category::class, 'category_id');
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getImageAttribute($value)
    {
        if ($value) {
            return 'data:image/jpeg;base64,'.base64_encode($value);
        }

        return null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
