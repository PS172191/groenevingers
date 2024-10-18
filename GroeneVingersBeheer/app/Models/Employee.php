<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'employee_id'; // Specify the primary key name

    public $incrementing = true; // Specify that the primary key is not auto-incrementing

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'position',
    ];
}
