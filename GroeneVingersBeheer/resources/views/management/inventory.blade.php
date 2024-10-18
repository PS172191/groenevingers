@extends('layouts.layout')

@section('content')
    <h1>Voorraad</h1>


    <div id="loading-screen" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="spinner"></div>
        <p>Laden...</p>
    </div>


    <div id="inventory-content" style="display: none;">
        <table>
            <thead>
            <tr>
                <th>Product</th>
                <th>Aantal</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        <a style="text-decoration: none;" href="{{ route('management.product.show', ['id' => $product['id']]) }}">
                            {{ $product['name'] }}
                        </a>
                    </td>
                    <td>{{ optional($product->inventory)->quantity ?? 'N/A' }}</td> <!-- Display quantity -->
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>

        document.getElementById("loading-screen").style.display = "flex";


        setTimeout(function() {

            document.getElementById("loading-screen").style.display = "none";

            document.getElementById("inventory-content").style.display = "block";
        }, 2000);
    </script>
@endsection
