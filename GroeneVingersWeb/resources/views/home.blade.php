@extends('base')

<title>Home</title>

@push('styles')
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    <link href="{{ asset('css/button.css') }}" rel="stylesheet">
@endpush

@section('body')
<div class="hero-image">
        <div class="hero-text">
            <div class="container">
                <h1 class="hero-titel">Groene Vingers: Ontdek de Natuur in Huis</h1>
                <p class="hero-subtitel">Breng de schoonheid van de natuur naar jouw leefruimte met onze duurzame
                    collectie</p>
                <a href="{{ route('products.index') }}" class="button-secondary">Producten</a> <button onclick="document.getElementById('doel').scrollIntoView();" class="button-secondary">Openingstijden</button>
            </div>
        </div>
    </div>
    <div class="sales-background">
        <div class="container">
            <h1 class="sales-title">Aanbiedingen</h1>
            <div class="row gy-5">
                <div class="col-12 col-md-4">
                    <div class="card">
                        <img class="card-img" src="" alt="">
                        <div class="card-name-Description">
                            <span>Naam</span>
                            <span>Beschrijving</span>
                        </div>
                        <div class="card-price-button">
                            <span class="card-price">€ 50</span>
                            <button class="card-button">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <img class="card-img" src="" alt="">
                        <div class="card-name-Description">
                            <span>Naam</span>
                            <span>Beschrijving</span>
                        </div>
                        <div class="card-price-button">
                            <span class="card-price">€ 50</span>
                            <button class="card-button">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <img class="card-img" src="" alt="">
                        <div class="card-name-Description">
                            <span>Naam</span>
                            <span>Beschrijving</span>
                        </div>
                        <div class="card-price-button">
                            <span class="card-price">€ 50</span>
                            <button class="card-button">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
