@extends('base')

<title>Vacatures bij Groene Vingers</title>

@push('styles')
    <link href="{{ asset('css/vacancies.css') }}" rel="stylesheet">
@endpush

@section('body')
    <div class="container vacancies-index">
        <h1>Vacatures bij Groene Vingers</h1>
    </div>
    <div class="container text-center">
        <div class="row ">
            @foreach ($vacancies as $vacancy)
                <div class="col-12 col-md-4 ">
                    <div class="vacancy-card">
                        <h2>{{ $vacancy['name'] }}</h2>
                        <span class="body-XL">{{ $vacancy['hours'] }} uur</span>
                        <p class="body-LG">{{ Str::limit($vacancy['description'], 150) }}</p>
                        <a class="body-xl" href="{{ route('vacancies.show', ['id' => $vacancy['id']]) }}">
                            <button class="Vacancies-card-button">
                                <span>Bekijk vacature</span>
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
