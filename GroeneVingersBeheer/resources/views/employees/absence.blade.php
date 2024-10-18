@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1 class="mt-5">Absentie melden</h1>
        <form action="{{ route('employee.absence') }}" method="POST">
            @csrf
            <div class="mb-3" label for="absence_type">Absentie type:</label>
                <select class="form-control" name="absence_type" id="absence_type">
                    @foreach ($absenceTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="mb-3">
                <label for="start_time">Starttijd:</label>
                <input class="form-control" type="datetime-local" name="start_time" id="start_time">
            </div>
            <br>
            <div class="mb-3">
                <label for="finish_time">Eindtijd:</label>
                <input class="form-control" type="datetime-local" name="finish_time" id="finish_time">
            </div>
            <br>
            <button class="btn btn-success" type="submit">Verzenden</button>
        </form>
    </div>
@endsection
