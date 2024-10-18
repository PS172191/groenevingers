<?php

namespace App\Http\Controllers;

class ShiftController extends Controller
{
    public function index()
    {
        return view('management.shifts');
    }
}
