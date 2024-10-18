@if (auth()->user()->role_id == 1)
    <x-app-layout>
        @section('title', 'Gebruiker toevoegen')

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Gebruiker toevoegen') }}
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
                                onclick="window.location='{{ route('management.index') }}'">Terug</button>
                            <form method="POST" action="{{ route('management.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-1 gap-4">
                                    <div class="flex flex-col">
                                        <label for="name">Naam:</label>
                                        <input id="name" class="text-black" type="text" name="name"
                                            required />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="email">E-Mail:</label>
                                        <input id="email" class="text-black" type="text" name="email"
                                            required />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="password">Wachtwoord:</label>
                                        <input id="password" class="text-black" type="password" name="password"
                                            required />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="role_id">Rol:</label>
                                        <select class="text-black" id="role_id" name="role_id" required>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="flex justify-start sm:justify-end mt-4 gap-2">
                                    <button type="submit" class="bg-green-500 hover:bg-green-400 py-2 px-4 rounded-lg">Toevoegen</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    {{ __('U heeft geen toegang tot deze pagina') }}
@endif
