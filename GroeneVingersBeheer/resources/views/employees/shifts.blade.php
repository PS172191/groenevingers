@extends('layouts.layout')
@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet"/>

@endpush

@section('content')

    <div id="calendar">
        @push('scripts')

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'timeGridWeek',
                        slotMinTime: '9:00:00',
                        slotMaxTime: '20:00:00',
                        themeSystem: 'bootstrap5',
                        timeZone: 'CEST',
                        allDaySlot: false,
                        locale: 'nl',
                        events: @json($data),

                    });
                    calendar.render();
                });

                $(function() {

                });
            </script>
        @endpush

    </div>



    @stack('scripts')

@endsection
