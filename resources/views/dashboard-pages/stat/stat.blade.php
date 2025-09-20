@extends('dashboard-layout.layout')
@section('page-title', 'الإحصائيات')
@section('main-content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>الإحصائيات</h1>
                 
            </div>
        </div>
    </section>
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="stat-icon mb-2"><i class="bi bi-cash-coin text-success" style="font-size:2em;"></i></div>
                        <div class="stat-text">عدد المبيعات</div>
                        <div class="stat-digit h3">{{ $salesCount }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="stat-icon mb-2"><i class="bi bi-receipt text-info" style="font-size:2em;"></i></div>
                        <div class="stat-text">عدد الطلبات</div>
                        <div class="stat-digit h3">{{ $ordersCount }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="stat-icon mb-2"><i class="bi bi-people-fill text-warning" style="font-size:2em;"></i></div>
                        <div class="stat-text">عدد الزبائن</div>
                        <div class="stat-digit h3">{{ $customersCount }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="stat-icon mb-2"><i class="bi bi-box-seam text-primary" style="font-size:2em;"></i></div>
                        <div class="stat-text">عدد المنتجات</div>
                        <div class="stat-digit h3">{{ $productsCount }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">نسب المبيعات حسب المنتج</div>
                    <div class="card-body">
                        <canvas id="salesPieChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">تطور المبيعات الشهري</div>
                    <div class="card-body">
                        <canvas id="salesLineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // بيانات الرسم البياني القرصي
        const pieLabels = {!! json_encode(array_values(array_map(function($id){ return 'منتج #' . $id; }, array_keys($salesByProduct->toArray()))) ) !!};
        const pieData = {!! json_encode(array_values($salesByProduct->toArray())) !!};
        new Chart(document.getElementById('salesPieChart'), {
            type: 'pie',
            data: {
                labels: pieLabels,
                datasets: [{
                    data: pieData,
                    backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545', '#6c757d', '#17a2b8'],
                }]
            }
        });

        // بيانات الرسم البياني النقطي
        const lineLabels = {!! json_encode(array_keys($salesByMonth->toArray())) !!};
        const lineData = {!! json_encode(array_values($salesByMonth->toArray())) !!};
        new Chart(document.getElementById('salesLineChart'), {
            type: 'line',
            data: {
                labels: lineLabels,
                datasets: [{
                    label: 'عدد المبيعات',
                    data: lineData,
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0,123,255,0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</div>

 @endsection