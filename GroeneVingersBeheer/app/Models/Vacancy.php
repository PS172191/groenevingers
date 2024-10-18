<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $table = 'vacancies';

    protected $fillable = ['name', 'hours', 'description', 'available'];
}
