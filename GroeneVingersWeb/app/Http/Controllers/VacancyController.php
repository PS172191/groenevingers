<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;

class VacancyController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::all();

        return view('vacancies.index', compact('vacancies'));
    }

    public function show($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        return view('vacancies.show', compact('vacancy'));
    }
}
