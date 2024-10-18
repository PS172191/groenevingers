@extends('base')

<title>Zoekresultaten | GroeneVingers</title>

@push('styles')
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
@endpush

@section('body')
    <div class="container">
        <div class="search-results">
            @if ($results->count())
                <h1>{{ $results->count() }} zoekresultaten gevonden</h1>
                @foreach ($results as $result)
                    {{-- <div class="result">
                        <p class="body-xl">- {{ $result->name }}</p>
                    </div> --}}
                    <div class="result">
                        <a class="body-xl" href="{{ route('products.show', $result->id) }}">
                            <div>{{ $result->name }}</div>
                            <div class="body-md">{{ $result->description }}</div>
                        </a>
                        <div class="price-arrow">
                            <div class="body-xxl">€{{ $result->price }}</div>
                            <a href="{{ route('products.show', $result->id) }}"><i
                                    class="fa-solid fa-circle-chevron-right"></i></a>
                        </div>
                    </div>
                @endforeach
            @else
                <h2>Geen resultaten gevonden.</h2>
            @endif
        </div>
    </div>
@endsection
