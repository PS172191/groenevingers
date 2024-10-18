@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Verkoopinfo</h1>
        <div class="flex">
            <div class="w-1/2 mr-4">
                <h2>Verkoop per dag</h2>
                <canvas id="salesPerDayChart" class="chart-canvas"></canvas>
            </div>
            <div class="w-1/2">
                <h2>Verkoop per medewerker</h2>
                <canvas id="salesPerEmployeeChart" class="chart-canvas"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        var salesPerDayLabels = @json($salesPerDay->pluck('date'));
        var salesPerDayData = @json($salesPerDay->pluck('total_sales'));

        var salesPerDayChartCtx = document.getElementById('salesPerDayChart').getContext('2d');
        var salesPerDayChart = new Chart(salesPerDayChartCtx, {
            type: 'bar',
            data: {
                labels: salesPerDayLabels,
                datasets: [{
                    label: 'Verkoop per dag',
                    data: salesPerDayData,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value, index, values) {
                                return value.toLocaleString("nl-NL",{style:"currency", currency:"EUR"});
                            }
                        }
                    }
                }
            }
        });


        var salesPerEmployeeLabels = @json($salesPerEmployee->pluck('name'));
        var salesPerEmployeeData = @json($salesPerEmployee->pluck('orders_count'));

        var salesPerEmployeeChartCtx = document.getElementById('salesPerEmployeeChart').getContext('2d');
        var salesPerEmployeeChart = new Chart(salesPerEmployeeChartCtx, {
            type: 'bar',
            data: {
                labels: salesPerEmployeeLabels,
                datasets: [{
                    label: 'Verkoop per medewerker',
                    data: salesPerEmployeeData,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <style>
        .chart-canvas {
            width: 100% !important;
            height: 400px !important;
            display: block;
        }
        .flex {
            display: flex;
        }
        .w-2 {
            flex: 0 0 50%;
            max-width: 50%;
        }
    </style>
@endsection
