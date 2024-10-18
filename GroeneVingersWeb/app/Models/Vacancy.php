<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $table = 'vacancies';

    protected $fillable = [
        'id',
        'name',
        'hours',
        'description',
        'offer',
        'offer_description',
        'requirement',
        'requirement_description',
        'available',
    ];
}
