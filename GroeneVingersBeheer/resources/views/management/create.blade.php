@extends('layouts.layout')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Voeg gebruiker toe</h1>
        <form action="{{ route('management.store') }}" method="POST" class="mt-5">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Naam</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3" label for="role_id">Rol:</label>
                <select class="form-control" name="role_id" id="role_id">
                    @foreach ($roleType as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
@endsection
