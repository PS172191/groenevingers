@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Gebruiker Details</h1>
            <div class="form-group mb-3">
                <label><strong>Naam:</strong></label>
                <p>{{ $user->name }}</p>
            </div>
            <div class="form-group mb-3">
                <label><strong>Email:</strong></label>
                <p>{{ $user->email }}</p>
            </div>
            <div class="form-group mb-3">
                <label><strong>Rol:</strong></label>
                <p>{{ $user->role->name }}</p>
            </div>
        <a href="{{ route('management.index') }}" class="btn btn-secondary">Terug</a>
    </div>
@endsection
