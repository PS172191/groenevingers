@if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
    @section('title', 'Producten beheren')

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Producten') }}
            </h2>
        </x-slot>

        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <button class="bg-blue-500 hover:bg-blue-400 py-2 px-4 rounded-lg mb-4"
                            onclick="window.location='{{ route('products.indexForEmployees') }}'">Terug</button>
                        <div class="product-content space-y-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="text-xl font-bold">Product:</div>
                                <div>{{ $product['name'] }}</div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="text-xl font-bold">Foto:</div>
                                <div><img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="img-fluid"
                                        style="max-width: 200px;"></div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="text-xl font-bold">Beschrijving:</div>
                                <div>{{ $product['description'] }}</div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="text-xl font-bold">Inkoopprijs:</div>
                                <div>€{{ $product['suppliers_price'] }}</div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="text-xl font-bold">Verkoopprijs:</div>
                                <div>€{{ $product['price'] }}</div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="text-xl font-bold">Categorie:</div>
                                <div>{{ $product->category->name }}</div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="text-xl font-bold">SKU:</div>
                                <div>{{ $product->sku }}</div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="text-xl font-bold">Barcode:</div>
                                <div class="flex justify-start">
                                    <div class="dark:bg-white p-5 dark:text-black">{!! DNS1D::getBarcodeHTML("$product->barcode", 'EAN13', 2, 100) !!}
                                        {{ $product['barcode'] }}</div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="text-xl font-bold">QR:</div>
                                <div class="flex justify-start">
                                    <div class="dark:bg-white p-5">{!! DNS2D::getBarcodeHTML("$product->name", 'QRCODE') !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    {{ __('U heeft geen toegang tot deze pagina') }}
@endif
