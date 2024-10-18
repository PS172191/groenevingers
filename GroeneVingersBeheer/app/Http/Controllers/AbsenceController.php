<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenceController extends Controller
{
    public function index()
    {
        $absenceTypes = Type::all();

        return view('employees.absence', compact('absenceTypes'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'absence_type' => 'required|exists:type,id',
            'start_time' => 'required|date',
            'finish_time' => 'required|date|after:start_time',
        ]);

        $absence = new Appointment();
        $absence->type_id = $validatedData['absence_type'];
        $absence->start_time = $validatedData['start_time'];
        $absence->finish_time = $validatedData['finish_time'];

        $absence->user_id = Auth::id();

        $absence->save();

        return redirect()->back()->with('success', 'Absence declaration submitted successfully.');
    }
}
