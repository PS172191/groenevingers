        @extends('base')

        <title></title>

        @push('styles')
            <link href="{{ asset('css/payment.css') }}" rel="stylesheet">
            <script src="{{ asset('js/javascript.js') }}"></script>
        @endpush

        @section('body')
            <div class="container">
                <h1 class="payment-titel">Betalen</h1>
                <form action="{{ route('myOrders') }} " method="post">
                    @csrf
                    <div class="row ">
                        <div class="col-md-6  ">
                            <div class="col-12">
                                <h2 class="payment-titel-info">Contact informatie</h2>
                            </div>
                            <div class="col-md-12  ">
                                <h3 class="form-label">Naam</h3>
                                <input type="text" required class="form-control" name="name" id="name">
                            </div>
                            <div class="col-md-12">
                                <h3 class="form-label">Telefoonnummer</h3>
                                <input type="text" required class="form-control" name="telefoonnummer"
                                    id="telefoonnummer">
                            </div>
                            <div class="col-12">
                                <h3 class="form-label">E-mail</h3>
                                <input type="email" required class="form-control" name="email" id="email">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="form-label">Postcode</h3>
                                    <input type="text" class="form-control" name="postcode" id="postcode">
                                </div>
                                <div class="col-md-6">
                                    <h3 class="form-label">Plaats</h3>
                                    <input type="text" class="form-control" name="plaats" id="plaats">
                                </div>
                                <div class="col-md-6">
                                    <h3 class="form-label">Straat</h3>
                                    <input type="text" class="form-control" name="straat" id="straat">
                                </div>
                                <div class="col-md-6">
                                    <h3 class="form-label">Huisnummer</h3>
                                    <input type="text" class="form-control" name="huisnummer" id="huisnummer">
                                </div>
                           
                            </div>
                            <h2 class="payment-titel-Delivery">Bezorgen optie</h2>
                            <div class="row gy-4">
                                <div class="col">
                                    <div class="payment-Delivery">
                                        <input type="radio" name="delivery_option" value="PostNL">
                                        <img class="payment-Delivery-img" src="{{ asset('images/logopostnl.png') }}"
                                            alt="Logo">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="payment-Delivery">
                                        <input type="radio" name="delivery_option" value="DHL">
                                        <img class="payment-Delivery-img" src="{{ asset('images/Logodhl.png') }}"
                                            alt="Logo">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="payment-Delivery">
                                        <input type="radio" name="delivery_option" value="Afhaalpunt">
                                        <h4>Afhaalpunt</h4>
                                    </div>
                                </div>
                            </div>

                            <h2 class="payment-titel-options">Betaal optie</h2>
                            <div class="row gy-4">

                                <div class="col">
                                    <div class="payment-options">
                                        <input type="radio" name="payment_option" value="bank"
                                            onclick="showDropdown('option1')">
                                        <img class="payment-option-img" src="{{ asset('images/IDEAL_logo.png') }}"
                                            alt="iDEAL Logo">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="payment-options">
                                        <input type="radio" name="payment_option" value="paypal"
                                            onclick="showDropdown('option1')">
                                        <img class="payment-option-img" src="{{ asset('images/Paypal_2014_logo.png') }}"
                                            alt="PayPal Logo">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <select id="dropdown-option1" class="payment-dropdown">
                                        <option>ABN</option>
                                        <option>AMRO</option>
                                        <option>ASN </option>
                                        <option>ING</option>
                                        <option>Knab</option>
                                        <option>Rabobank</option>
                                        <option>RegioBank</option>
                                        <option>SNS Bank</option>
                                        <option>Rabobank</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="payment-Samenvatting-backgroud">
                                <h3>Samenvatting</h3>
                                <hr>
                                <div>

                                    @foreach ($_SESSION['cart'] as $key => $item)
                                        <div class="payment-Samenvatting-items row">
                                            <span class="col-4 body-xl">{{ $item['name'] }}</span>
                                            <span class="col-4 body-xl">aantal:{{ $item['amount'] }}</span>
                                            <span class="col-4 body-xl">€<?php echo $item['price'] * $item['amount']; ?></h3>
                                        </div>
                                    @endforeach
                                </div>
                                <hr>
                                <div class="payment-Samenvatting-betaal-info">
                                    <div class="payment-Samenvatting-totaal">
                                        <h3>Totaal</h3>
                                        @php
                                            $totalPrice = 0;
                                        @endphp

                                        @foreach ($_SESSION['cart'] as $item)
                                            @php
                                                $subtotal = $item['price'] * $item['amount'];
                                                $totalPrice += $subtotal;
                                            @endphp
                                        @endforeach
                                        <h3>€{{ $totalPrice }}</h3>

                                    </div>
                                    <div class="body-SM">incl. BTW</div>
                                </div>

                                <div class="payment-Samenvatting-check">
                                    <input type="checkbox" id="" name="" value="">
                                    <a href="terms">
                                        <h4>Ik ga akkoord met de voorwaarden</h4>
                                    </a>
                                </div>
                                <button type="submit" class="payment-button"
                                    onclick="showPaymentPopup()">Betalen</button>

                            </div>
                </form>
            </div>

            </div>
            </div>
            <script type="text/javascript">
                function showPaymentPopup() {
                    alert("Er is betaald");
                }
            </script>
        @endsection
