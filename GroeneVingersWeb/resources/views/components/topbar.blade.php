<div class="topbar">
    <div class="topbar-content">
        @php
            $dayOfWeek = date('N');
            $openingHours = [
                1 => 'Vandaag: Gesloten',
                2 => 'Vandaag geopend van 09:00-18:00',
                3 => 'Vandaag geopend van 09:00-18:00',
                4 => 'Vandaag geopend van 09:00-21:00',
                5 => 'Vandaag geopend van 09:00-18:00',
                6 => 'Vandaag geopend van 09:00-17:00',
                7 => 'Vandaag geopend van 09:00-17:00 ',
            ];
        @endphp

        <p class="body-xl">{{ $openingHours[$dayOfWeek] }}</p>
    </div>
    </div>
</div>
