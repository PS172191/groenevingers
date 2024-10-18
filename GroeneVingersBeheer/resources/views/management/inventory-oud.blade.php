@extends('layouts.layout')

@section('content')
    <h1>Inventory</h1>

    <!-- Loading screen -->
    <div id="loading-screen" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="spinner"></div>
        <p>Laden...</p>
    </div>

    <!-- Inventory content (hidden by default) -->
    <div id="inventory-content" style="display: none;">
        <table>
            <thead>
            <tr>
                <th>Product</th>
                <th>Beschrijving</th>
                <th>Prijs</th>
                <th>Foto</th>
                <!-- Add more columns as needed -->
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['description'] }}</td>
                    <td>{{ $product['price'] }}</td>
                    <td><img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" style="max-width: 100px;"></td>
                    <!-- Add more columns as needed -->
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Display loading screen
        document.getElementById("loading-screen").style.display = "flex";

        // Simulate delay for demonstration purposes
        setTimeout(function() {
            // Hide loading screen
            document.getElementById("loading-screen").style.display = "none";
            // Show inventory content
            document.getElementById("inventory-content").style.display = "block";
        }, 2000); // Adjust delay time as needed
    </script>
@endsection
