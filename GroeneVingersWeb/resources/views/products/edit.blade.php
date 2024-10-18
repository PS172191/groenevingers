@if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
    <x-app-layout>
        @section('title', 'Product bewerken')

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Product bewerken') }}
            </h2>
        </x-slot>

        @if ($errors->any())
            <div class="alert alert-danger bg-red-500 text-black">
                <ul>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div>
                            <button class="bg-blue-500 hover:bg-blue-400 py-2 px-4 rounded-lg mb-4"
                                onclick="window.location='{{ route('products.indexForEmployees') }}'">Terug</button>
                            <form method="POST" action="{{ route('products.update', $product->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="flex flex-col">
                                        <label for="name">Naam:</label>
                                        <input id="name" class="text-black" type="text" name="name"
                                            value="{{ $product->name }}" required />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="description">Beschrijving:</label>
                                        <input id="description" class="text-black" type="text" name="description"
                                            value="{{ $product->description }}" required />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="price">Prijs:</label>
                                        <input id="price" class="text-black" type="number" name="price"
                                            value="{{ $product->price }}" required step="0.01" min="0"
                                            placeholder="0.00" />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="color">Kleur:</label>
                                        <input id="color" class="text-black" type="text" name="color"
                                            value="{{ $product->color }}" required />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="height_cm">Hoogte (cm):</label>
                                        <input id="height_cm" class="text-black" type="number" name="height_cm"
                                            value="{{ $product->height_cm }}" required />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="width_cm">Breedte (cm):</label>
                                        <input id="width_cm" class="text-black" type="number" name="width_cm"
                                            value="{{ $product->width_cm }}" required />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="depth_cm">Diepte (cm):</label>
                                        <input id="depth_cm" class="text-black" type="number" name="depth_cm"
                                            value="{{ $product->depth_cm }}" required />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="weight_gr">Gewicht (gr):</label>
                                        <input id="weight_gr" class="text-black" type="number" name="weight_gr"
                                            value="{{ $product->weight_gr }}" required />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="category_id">Categorie:</label>
                                        <select class="text-black" id="category_id" name="category_id" required>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex flex-col md:flex-row">
                                            <div class="flex flex-col mr-3">
                                                <label for="image">Huidige Afbeelding:</label>
                                                <img src="{{ $product->image }}"
                                                    style="max-width: 200px; max-height: 200px;">
                                            </div>
                                            <div class="flex flex-col">
                                                <label for="image">Nieuwe Afbeelding:</label>
                                                <img id="image-preview"
                                                    style="max-width: 200px; max-height: 200px; display: none;" />
                                            </div>
                                        </div>
                                        <input class="bg-white text-black mt-3" id="image" type="file"
                                            name="image" accept="image/*" onchange="previewImage(event)" />
                                    </div>
                                </div>
                                <div class="flex justify-start sm:justify-end mt-4">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-400 py-2 px-4 rounded-lg">Opslaan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function previewImage(event) {
                    var reader = new FileReader();
                    reader.onload = function() {
                        var output = document.getElementById('image-preview');
                        output.src = reader.result;
                        output.style.display = 'block';
                    };
                    reader.readAsDataURL(event.target.files[0]);
                }
            </script>
    </x-app-layout>
@else
    {{ __('U heeft geen toegang tot deze pagina') }}
@endif
