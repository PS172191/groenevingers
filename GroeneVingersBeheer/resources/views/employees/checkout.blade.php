@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1 class="mt-5">Kassa</h1>
        <form method="POST" action="{{ route('checkout.store') }}" class="mt-4">
            @csrf

            <div class="mb-3">
                <label for="customer_name" class="form-label">Naam:</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name">
            </div>

            <div class="mb-3">
                <label for="postcode" class="form-label">Postcode:</label>
                <input type="text" class="form-control" id="postcode" name="postcode">
            </div>

            <div class="mb-3">
                <label for="house_number" class="form-label">Huisnummer:</label>
                <input type="text" class="form-control" id="house_number" name="house_number">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Adres:</label>
                <input type="text" class="form-control" id="address" name="address" readonly>
            </div>

            <button type="button" id="lookupAddress" class="btn btn-primary">Zoek adres</button>

            <div class="mb-3">
                <label for="product" class="form-label">Selecteer product:</label>
                <select name="product" id="product" class="form-select">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} - €{{ $product->price }}</option>
                    @endforeach
                </select>
            </div>
            <button type="button" id="addProduct" class="btn btn-success">Voeg product toe</button>
            <ul id="selectedProducts" class="list-group mt-3"></ul>
            <input type="hidden" name="selectedProducts" id="selectedProductsInput">
            <button type="submit" class="btn btn-primary">Plaats bestelling</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addProductBtn = document.getElementById('addProduct');
            const selectedProductsList = document.getElementById('selectedProducts');
            const selectedProductsInput = document.getElementById('selectedProductsInput');

            addProductBtn.addEventListener('click', function () {
                const productId = document.getElementById('product').value;
                const productName = document.getElementById('product').options[document.getElementById('product').selectedIndex].text;
                const listItem = document.createElement('li');
                listItem.textContent = productName;
                listItem.className = 'list-group-item';
                selectedProductsList.appendChild(listItem);

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'products[]';
                input.value = productId;
                listItem.appendChild(input);

                updateSelectedProductsInput();
            });

            function updateSelectedProductsInput() {
                const selectedProductInputs = selectedProductsList.querySelectorAll('input');
                const selectedProductIds = Array.from(selectedProductInputs).map(input => input.value);
                selectedProductsInput.value = JSON.stringify(selectedProductIds);
            }
        });


        document.getElementById('lookupAddress').addEventListener('click', function() {

            const postcode = document.getElementById('postcode').value;
            const houseNumber = document.getElementById('house_number').value;

            getAddressFromPostcodeAndHouse(postcode, houseNumber);
        });

        function getAddressFromPostcodeAndHouse(postcode, houseNumber) {
            const apiKey = 'ArGkRG9i9A8WjC2G2_BZybftt-RZu6YpQnQbEPX50vg6amY5I1uRsZoMlkEyZX5P';
            const url = `https://dev.virtualearth.net/REST/v1/Locations?postalCode=${postcode}&addressLine=${houseNumber}&key=${apiKey}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    const address = data.resourceSets[0].resources[0].address;

                    const fullAddress = `${address.addressLine}, ${address.locality}, ${address.adminDistrict}, ${address.countryRegion}`;
                    console.log('Full Address:', fullAddress);

                    document.getElementById('address').value = fullAddress;
                })
                .catch(error => {
                    console.error('Error fetching address:', error);
                });
        }
    </script>
@endsection
