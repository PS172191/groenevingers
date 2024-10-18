@extends('layouts.layout')
@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet"/>
    <script src='fullcalendar/dist/index.global.js'></script>
@endpush

@section('content')
    <h2>Welkom, {{ Auth::user()->name }}</h2>
    <div id="calendar">
        @push('scripts')



                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var calendarEl = document.getElementById('calendar');
                            var calendar = new FullCalendar.Calendar(calendarEl, {
                                initialView: 'timeGridDay',
                                slotMinTime: '9:00:00',
                                slotMaxTime: '20:00:00',
                                themeSystem: 'bootstrap5',


                                events: @json($data),
                            });
                            calendar.render();
                        });
                    </script>

        @endpush

    </div>



    @stack('scripts')

@endsection
