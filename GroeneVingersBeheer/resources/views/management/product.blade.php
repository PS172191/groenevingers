@extends('layouts.layout')

@section('content')
    <h1 class="mt-4">Product informatie:</h1>

    <div class="product-content border rounded p-4">
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Product:</div>
            <div class="col-md-9">{{ $product['name'] }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Foto:</div>
            <div class="col-md-9"><img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="img-fluid" style="max-width: 100px;"></div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Beschrijving:</div>
            <div class="col-md-9">{{ $product['description'] }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Inkoopprijs:</div>
            <div class="col-md-9">€{{ $product['suppliers_price'] }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Verkoopprijs:</div>
            <div class="col-md-9">€{{ $product['price'] }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Categorie:</div>
            <div class="col-md-9">{{ $product->category->name }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">SKU:</div>
            <div class="col-md-9">{{ $product->sku }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Barcode:</div>
            <div class="col-md-9">{!! DNS1D::getBarcodeHTML("$product->barcode", 'EAN13', 2, 100) !!} {{$product['barcode']}}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">QR:</div>
            <div class="col-md-9">{!! DNS2D::getBarcodeHTML("$product->name", 'QRCODE') !!}</div>
        </div>
    </div>

@endsection
