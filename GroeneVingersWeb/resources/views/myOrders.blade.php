@if (auth()->user()->role_id == 3)
    @section('title', 'Mijn bestellingen')

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Mijn bestellingen') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- Order Information Table -->
                        <table class="table-auto w-full mb-6">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Veld</th>
                                    <th class="px-4 py-2">Waarde</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($_SESSION['order']))
                                    <tr>
                                        <td class="border px-4 py-2">Naam</td>
                                        <td class="border px-4 py-2">{{ $_SESSION['order']['name'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2">Telefoonnummer</td>
                                        <td class="border px-4 py-2">{{ $_SESSION['order']['telefoonnummer'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2">Email</td>
                                        <td class="border px-4 py-2">{{ $_SESSION['order']['email'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2">Postcode</td>
                                        <td class="border px-4 py-2">{{ $_SESSION['order']['postcode'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2">Plaats</td>
                                        <td class="border px-4 py-2">{{ $_SESSION['order']['plaats'] }}</td>
                                    </tr>

                                    <tr>
                                        <td class="border px-4 py-2">Straat</td>
                                        <td class="border px-4 py-2">{{ $_SESSION['order']['straat'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2">Huisnummer</td>
                                        <td class="border px-4 py-2">{{ $_SESSION['order']['huisnummer'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2">Bezorgoptie</td>
                                        <td class="border px-4 py-2">{{ $_SESSION['order']['delivery_option'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2">Betaaloptie</td>
                                        <td class="border px-4 py-2">{{ $_SESSION['order']['payment_option'] }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="border px-4 py-2" colspan="2">Geen gegevens beschikbaar</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <!-- Cart Items Table -->
                        <table class="table-auto w-full mb-6">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Productnaam</th>
                                    <th class="px-4 py-2">Aantal</th>
                                    <th class="px-4 py-2">Prijs</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach ($_SESSION['cart'] as $key => $item)
                                    @php
                                        $subtotal = $item['price'] * $item['amount'];
                                        $totalPrice += $subtotal;
                                    @endphp
                                    @php
                                        $btw = $subtotal * 0.21;
                                        // $btw = $subtotal * ($btw_percentage / 100);
                                        $totalPrice = $subtotal;
                                    @endphp
                                    <tr>
                                        <td class="border px-4 py-2">{{ $item['name'] }}</td>
                                        <td class="border px-4 py-2">{{ $item['amount'] }}</td>
                                        <td class="border px-4 py-2">€{{ number_format($subtotal, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Total Price -->
                        <div class="text-right">
                            <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                Totaal: €{{ number_format($totalPrice, 2, ',', '.') }}
                            </h3>
                            <p class="">BTW 21%:
                                €{{ number_format($btw, 2, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    {{ __('U heeft geen toegang tot deze pagina') }}
@endif
