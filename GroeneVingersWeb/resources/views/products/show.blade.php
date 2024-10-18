@extends('base')

<title>{{ $product['name'] }} | GroeneVingers</title>

@push('styles')
    <link href="{{ asset('css/products/product.css') }}" rel="stylesheet">
@endpush

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="product-image">
                    <img src="{{ $product['image'] }}"></img>
                </div>
            </div>
            <div class="col-12 col-md-4 product-info">
                <div class="product-name">
                    <h1>{{ $product['name'] }}</h1>
                </div>
                <div class="product-price">
                    <h2>€{{ $product['price'] }}</h2>
                </div>
                <div class="product-stock">
                    @if (optional($product->inventory)->quantity == 0)
                        <label class="out-of-stock">Momenteel niet leverbaar</label>
                    @else
                        <label><i class="fa-solid fa-warehouse"></i> {{ optional($product->inventory)->quantity }} op
                            voorraad.</label>
                        @if (optional($product->inventory)->quantity != 0)
                            <label class="delivery-time"><i class="fa-solid fa-circle-check"></i> Voor 23:59 besteld, morgen
                                in huis</label>
                        @endif
                    @endif
                </div>
                <form method="POST" action="{{ route('shoppingcart') }}">
                    @csrf
                <div class="cart-btn">
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                    <button><i class="fa-solid fa-cart-plus"></i> In winkelwagen</button>
                </div>
            </form>
                <div class="shop-services">
                    <label><i class="fa-solid fa-check"></i> Niet goed, geld <span>terug</span></label>
                    <label><i class="fa-solid fa-check"></i> <span>Gratis</span> retour binnen 30 dagen</label>
                    <label><i class="fa-solid fa-check"></i> <span>Thuisbezorgd</span> of bij een
                        <span>afhaalpunt</span></label>
                </div>
            </div>
        </div>
        <div class="row product-extra-info">
            <div class="col-12">
                <div class="product-description">
                    <button class="collapsible">Beschrijving</button>
                    <div class="content">
                        <p>{{ $product['description'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="product-specifications">
                    <button class="collapsible">Specificaties</button>
                    <div class="content">
                        <table class="specifications">
                            <tr>
                                <td>Kleur</td>
                                <td>{{ $product['color'] }}</td>
                            </tr>
                            <tr>
                                <td>Barcode</td>
                                <td>{{ $product['barcode'] }}</td>
                            </tr>
                            <tr>
                                <td>SKU</td>
                                <td>{{ $product['sku'] }}</td>
                            </tr>
                            <tr>
                                <td>Hoogte</td>
                                <td>{{ $product['height_cm'] }}</td>
                            </tr>
                            <tr>
                                <td>Breedte</td>
                                <td>{{ $product['width_cm'] }}</td>
                            </tr>
                            <tr>
                                <td>Diepte</td>
                                <td>{{ $product['depth_cm'] }}</td>
                            </tr>
                            <tr>
                                <td>Gewicht</td>
                                <td>{{ $product['weight_gr'] }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }
    </script>
@endsection
