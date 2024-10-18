@extends('base')

<title></title>

@push('styles')
    <link href="{{ asset('css/shoppingcart.css') }}" rel="stylesheet">
@endpush

@section('body')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <div class="container">
        <h1 class="shoppingcart-title">Winkelmandje</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="row shoppingcart-info">
                    <h3 class="col-3">Producten</h3>
                    <h3 class="col-2 text-center">Prijs</h3>
                    <h3 class="col-2 text-center">Aantal</h3>
                    <h3 class="col-2 text-center">Totaal</h3>
                    <div class="col-3"></div>
                </div>
                {{-- @dd($_SESSION["cart"]) --}}
                @foreach ($_SESSION['cart'] as $key => $item)
                    <div class="row shoppingcart-items ">
                        <div class="col-3">

                            <img class="shoppingcart-img" src="{{ $item['img'] }}" alt="">
                            <h3>{{ $item['name'] }}</h3>
                            {{-- @dd( $item['name']) --}}

                        </div>

                        <div class="col-2 text-center shoppingcart-vertical-center">
                            <h3>€{{ $item['price'] }}</h3>
                        </div>

                        <div class="col-2 text-center shoppingcart-vertical-center">
                            <div class="shoppingcart-button-Quantity">
                                <button class="btn btn-link px-2" onclick="updateCart(event, 'decrement')">
                                    <i class="fas fa-minus" data-product="{{ $key }}"></i>
                                </button>

                                <input id="form1" min="0" name="quantity" value="{{ $item['amount'] }}"
                                    type="number"class="form-control form-control-sm" />

                                <button class="btn btn-link px-2" onclick="updateCart(event, 'increment')">
                                    <i class="fas fa-plus" data-product="{{ $key }}"></i>
                                </button>
                            </div>

                        </div>

                        <div class="col-2 text-center shoppingcart-vertical-center">
                            <h3>€<?php echo $item['price'] * $item['amount']; ?></h3>
                        </div>

                        <div class="col-3 shoppingcart-vertical-center">

                            <button type="submit" data-product="{{ $key }}" onclick="deleteCart(event)"
                                class="btn btn-danger">Verwijder</button>

                        </div>

                    </div>
                @endforeach
            </div>
            <div class="col-12 col-md-4">
                <div class="shoppingcart-totaal">
                    <div class="shoppingcart-totaal-info">
                        <h4>Winkelmandje totaal</h4>
                        @php
                            $totalPrice = 0;
                        @endphp

                        @foreach ($_SESSION['cart'] as $item)
                            @php
                                $subtotal = $item['price'] * $item['amount'];
                                $totalPrice += $subtotal;
                            @endphp
                        @endforeach
                        <h4>€{{ $totalPrice }}</h4>
                    </div>
                    <hr>
                    <a class="shoppingcart-button" href="{{ route('payment') }}">Ga verder naar
                        Betalen</a>
                </div>
            </div>
        </div>
    </div>
    <script>
     function updateCart(event, operation) {
    const productId = event.target.dataset.product;
    console.log('updateCart', productId, operation);

    axios.post('shoppingcart', {
            product_id: productId,
            type: 'cartamount',
            operation: operation
        })
        .then(function(response) {
            console.log(response);
            if (response.data.status === 'success') {
                window.location.reload(); // Reload the page to reflect changes
            } else if (response.data.status === 'error') {
                alert(response.data.message); // Show error message to the user
            }
        })
        .catch(function(error) {
            console.log(error);
        });
}


        function deleteCart(event) {
            const productId = event.target.dataset.product;
            console.log('deleteCart', productId);

            axios.post('shoppingcart', {
                    product_id: productId,
                    type: 'deleteitem',

                })
                .then(function(response) {
                    console.log(response);
                    window.location.reload(); // Reload the page to reflect changes
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    </script>
@endsection
