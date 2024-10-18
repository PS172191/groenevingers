@extends('base')

<title>Vacatures bij Groene Vingers</title>

@push('styles')
    <link href="{{ asset('css/vacancies.css') }}" rel="stylesheet">
@endpush

@section('body')
    <div class="container vacancies-show">
        <h2>{{ $vacancy['name'] }}</h2>
        <div class="vacancies-show-time-level">
            <h2> <i class="fa-regular fa-clock"></i> {{ $vacancy['hours'] }} uur</h2>
            <h2><i class="fa-solid fa-graduation-cap"></i>MBO</h2>
        </div>
        <div class="vacancies-show-infoblock">
            <h2>over deze baan</h2>
            <h3>{{ $vacancy['description'] }}</h3>
        </div>

        <div class="vacancies-show-infoblock">
            <h2>{{ $vacancy['offer'] }}</h2>
            <h3>{{ $vacancy['offer_description'] }}</h3>
        </div>

        <div class="vacancies-show-infoblock">
            <h2>{{ $vacancy['requirement'] }}</h2>
            <h3>{{ $vacancy['requirement_description'] }}</h3>
        </div>

        <button class="button-primary">solliciteren</button>
    </div>
@endsection
