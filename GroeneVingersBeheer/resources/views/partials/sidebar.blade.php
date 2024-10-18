<div class="bg-dark sticky-top pl-0 pt-5;" id="sidebar" style="min-height: 100dvh;">
    <div class="sidebar-heading"></div>
    <ul class="list-group" >

        @if (Auth::check() && Auth::user()->role_id === 1)

            <li style="background-color: #005A00;" class="list-group-item"><a style="color: white;" class="text-decoration-none" href="{{ route('management.index') }}">Thuis</a></li>
            {{-- <li style="background-color: #005A00;" class="list-group-item"><a style="color: white;" class="text-decoration-none" href="{{ route('management.inventory')}}">Inventaris</a></li> --}}
            <li style="background-color: #005A00;" class="list-group-item"><a style="color: white;" class="text-decoration-none" href="{{ route('management.sales') }}">Verkoop</a></li>
            <li style="background-color: #005A00;" class="list-group-item"><a style="color: white;" class="text-decoration-none" href="{{ route('management.wholesale') }}">Inkoop</a></li>
        @elseif (Auth::user()->role_id === 2)
            <li style="background-color: #005A00;" class="list-group-item"><a style="color: white;" class="text-decoration-none" href="{{ route('employee.welcome') }}">Thuis</a></li>
            <li style="background-color: #005A00;" class="list-group-item"><a style="color: white;" class="text-decoration-none" href="{{ route('employee.shifts') }}">Dienst</a></li>
            <li style="background-color: #005A00;" class="list-group-item"><a style="color: white;" class="text-decoration-none" href="{{ route('employee.absence') }}">Absentie</a></li>
            <li style="background-color: #005A00;" class="list-group-item"><a style="color: white;" class="text-decoration-none" href="{{ route('employee.checkout') }}">Kassa</a></li>


        @endif
    </ul>
</div>
