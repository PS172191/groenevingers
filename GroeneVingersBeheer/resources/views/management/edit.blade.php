@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Bewerk gebruiker</h1>
        <form action="{{ route('management.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name">Naam</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3" label for="role_id">Role:</label>
                <select class="form-control" name="role_id" id="role_id">
                    @foreach ($roleType as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Updaten</button>
        </form>
    </div>
@endsection
