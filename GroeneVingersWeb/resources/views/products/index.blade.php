@extends('base')

<title>{{ $category->name ?? 'Producten' }} | GroeneVingers</title>

@push('styles')
    <link href="{{ asset('css/products/products-page.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet">
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
                <div class="sticky-top category-navigation-test">
                    <a href="{{ route('products.index') }}" class="active">
                        <p class="body-xl">Alle Producten</p>
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>
                    @foreach ($categories as $cat)
                        <a href="{{ route('products.category', $cat->id) }}"
                            class="{{ isset($categoryId) && $categoryId == $cat->id ? 'active' : '' }}">
                            <p class="body-xl">{{ $cat['name'] }}</p>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="col-12 col-md-9 category-row">
                <div class="row">
                    @foreach ($productsPerCategory as $key => $products)
                        @php
                            $currentCategory = $categories->firstWhere('id', $key);
                        @endphp
                        <h2 id="categoryname">{{ $currentCategory->name }}</h2>
                        <div class="swiper productswiper">
                            <div class="swiper-wrapper">
                                @foreach ($products as $product)
                                    <div class="swiper-slide">
                                        <div class="product-card">
                                            <div class="product-img">
                                                <picture>
                                                    <a href="{{ route('products.show', ['id' => $product['id']]) }}">
                                                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
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
                                                                {{ optional($product->inventory)->quantity }} op voorraad.
                                                            </p>
                                                        @endif
                                                    </div>
                                                    <div class="product-price">
                                                        <label id="standard-price"
                                                            class="body-xl">€{{ $product['price'] }}</label>
                                                    </div>
                                                    {{-- <div class="product-price">
                                                        @php
                                                            $formattedPrice = number_format($product['price'], 2, ',', '');
                                                        @endphp
                                                        <label id="standard-price" class="body-xl">€{{ $formattedPrice }}</label>
                                                    </div> --}}
                                                </div>
                                                <div class="add-to-cart">
                                                    <form method="POST" action="{{ route('shoppingcart') }}">
                                                        @csrf
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $product['id'] }}">
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
                            <!-- Add Pagination if needed -->
                            <div class="swiper-pagination"></div>
                            <!-- Add Navigation if needed -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper('.productswiper', {
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                480: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1400: {
                    slidesPerView: 3,
                    spaceBetween: 50,
                },
            },
        });
    });
</script>
