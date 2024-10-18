<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    private function prepareAppointmentsData(): array
    {
        $user = Auth::user();
        $appointments = $user->calendarEvents()->get();

        $data = [];
        foreach ($appointments as $appointment) {
            $data[] = [
                'title' => $appointment->employee,
                'start' => $appointment->start_time,
                'end' => $appointment->finish_time,
            ];
        }

        return $data;
    }

    public function welcome(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = $this->prepareAppointmentsData();

        return view('employees.welcome', compact('data'));
    }

    public function shifts(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = $this->prepareAppointmentsData();

        return view('employees.shifts', compact('data'));
    }
}
