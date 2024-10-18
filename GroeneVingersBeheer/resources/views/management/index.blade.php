@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Gebruikers Management</h1>
        <a href="{{ route('management.create') }}" class="btn btn-primary mb-3">Voeg gebruiker toe</a>
        <table class="table">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Naam</th>
                    <th>Email</th>
                    {{-- <th>Rol</th> --}}
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        {{-- <td>{{ $user->id }}</td> --}}
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        {{-- <td>{{ $user->role->name }}</td> --}}
                        <td>
                            <a href="{{ route('management.show', $user->id) }}" class="btn btn-info btn-sm">Inzien</a>
                            <a href="{{ route('management.edit', $user->id) }}" class="btn btn-primary btn-sm">Wijzigen</a>
                            <form action="{{ route('management.destroy', $user->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Weet u zeker dat u deze gebruiker wilt verwijderen?')">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
