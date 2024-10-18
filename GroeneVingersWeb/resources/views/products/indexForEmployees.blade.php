@if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)

    @section('title', 'Producten beheren')

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Producten') }}
            </h2>
        </x-slot>

        <div class="py-5">
            <div class="max-w-7xl mx-auto lg:px-8 text-center">
                @if (session()->has('message'))
                    <div class="alert alert-success mb-3 bg-green-500 text-white rounded-lg p-1">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div>
                            <div class="mb-6">
                                <a href="{{ route('products.create') }}"
                                    class="bg-green-500 hover:bg-green-400 py-2 px-4 rounded-lg text-sm sm:text-base">Voeg
                                    product toe</a>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full w-full table-auto">
                                    <thead>
                                        <tr
                                            class="text-left text-sm sm:text-base first-letter:border-b-2 border-solid border-customBorderColor">
                                            {{-- <th>ID</th> --}}
                                            <th class="w-1/5">Naam</th>
                                            <th class="w-1/5">Prijs</th>
                                            <th class="w-1/5">Voorraad</th>
                                            <th class="w-1/5">Barcode</th>
                                            <th class="w-1/5">Beheer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr class="text-xs sm:text-base border-b-2 border-solid border-customBorderColor hover:bg-customBorderColorHover" >
                                                {{-- <td>{{ $product['id'] }}</td> --}}
                                                <td class="w-1/5">{{ $product['name'] }}</td>
                                                <td class="w-1/5">{{ $product['price'] }}</td>
                                                @if (optional($product->inventory)->quantity == null)
                                                    <td class="w-1/5">0</td>
                                                @else
                                                    <td class="w-1/5">{{ optional($product->inventory)->quantity }}
                                                    </td>
                                                @endif
                                                <td class="w-1/5">{{ $product['barcode'] }}</td>
                                                <td class="w-1/5 flex flex-row gap-2">
                                                    <button class="bg-yellow-500 hover:bg-yellow-400 my-2 py-2 px-4 rounded-lg"
                                                        onclick="window.location='{{ route('products.showForEmployees', $product->id) }}'"><i
                                                            class="fa-solid fa-eye"
                                                            style="color: #ffffff;"></i></button>
                                                    <button class="bg-blue-500 hover:bg-blue-400 my-2 py-2 px-4 rounded-lg"
                                                        onclick="window.location='{{ route('products.edit', $product->id) }}'"><i
                                                            class="fa-solid fa-pen-to-square"
                                                            style="color: #ffffff;"></i></button>
                                                    <form action="{{ route('products.destroy', $product->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            onclick="return confirm('Weet u zeker dat u dit product wilt verwijderen?')"
                                                            class="bg-red-500 hover:bg-red-400 my-2 py-2 px-4 rounded-lg"><i
                                                                class="fa-solid fa-trash-can"
                                                                style="color: #ffffff;"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
