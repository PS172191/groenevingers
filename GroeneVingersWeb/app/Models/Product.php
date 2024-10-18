<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable, SoftDeletes;

    protected $table = 'products';

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
    ];

    public function inventory(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Inventory::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function toSearchableArray()
    {
        // Specificeer welke velden je wilt doorzoeken
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ];
    }

    public function getImageAttribute($value)
    {
        if ($value) {
            return 'data:image/jpeg;base64,'.base64_encode($value);
        }

        return null;
    }
}
