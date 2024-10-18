<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Ensure the primary key is explicitly set

    protected $fillable = [
        'id', // Make sure 'id' is included in the $fillable array
        'name',
        'description',
    ];

    public $incrementing = true; // Ensure that the primary key is auto-incrementing
}
