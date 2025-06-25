@extends('base')

@section('title', 'Dashboard')

@section('header_title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Grafik Jumlah Member</h4>
                </div>
                <div class="card-body">
                    <canvas id="memberChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('memberChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Jumlah Member',
                    data: [
                        @php
                            use Carbon\Carbon;
                            $monthlyCounts = [];
                            for ($month = 1; $month <= 12; $month++) {
                                $count = \App\Models\AdminUser::whereMonth('created_at', $month)
                                            ->whereYear('created_at', now()->year)
                                            ->count();
                                $monthlyCounts[] = $count;
                            }
                        @endphp
                        {{ implode(',', $monthlyCounts) }}
                    ],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection