@extends('base')

<title>{{ $category->name ?? 'Producten' }} | GroeneVingers</title>

@push('styles')
    <link href="{{ asset('css/products/products-page.css') }}" rel="stylesheet">
@endpush

@section('body')
    <div class="container">
        <div class="row">
            <div class="page-title">
                <h1>{{ $category->name ?? 'Producten' }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3 category-navigation">
                <a href="{{ route('products.index') }}">
                    <p class="body-xl">Alle Producten</p>
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
                @foreach ($categories as $category)
                    <a href="{{ route('products.category', $category->id) }}"
                        class="{{ isset($categoryId) && $categoryId == $category->id ? 'active' : '' }}">
                        <p class="body-xl">{{ $category['name'] }}</p>
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>
                @endforeach
            </div>
            <div class="col-12 col-md-9 category-row">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-12 col-md-6 col-lg-4 gy-4">
                            <div class="product-card">
                                <div class="product-img">
                                    <picture>
                                        <a href="{{ route('products.show', ['id' => $product['id']]) }}">
                                            <img src="{{ $product['image'] }}">
                                        </a>
                                    </picture>
                                </div>
                                <div class="product-info">
                                    <div class="name-stock-price">
                                        <a class="body-xl"
                                            href="{{ route('products.show', ['id' => $product['id']]) }}">{{ $product['name'] }}</a>
                                        <div class="product-stock">
                                            @if (optional($product->inventory)->quantity == 0)
                                                <p class="body-xl out-of-stock">Niet op voorraad.</p>
                                            @else
                                                <p class="body-xl in-stock">
                                                    {{ optional($product->inventory)->quantity }}
                                                    op
                                                    voorraad.</p>
                                            @endif
                                        </div>
                                        <div class="product-price">
                                            <label id="standard-price" class="body-xl">€{{ $product['price'] }}</label>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <form method="POST" action="{{ route('shoppingcart') }}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                            <button class="add-to-cart-btn">
                                                <i class="fa-solid fa-cart-plus"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
