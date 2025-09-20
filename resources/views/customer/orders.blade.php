@extends('layout.master2')
@section('content')
<div class="container py-5">
    <h2 class="mb-4">طلباتي السابقة</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>رقم الطلب</th>
                    <th>المجموع</th>
                    <th>الحالة</th>
                    <th>تاريخ الطلب</th>
                </tr>
            </thead>
            <tbody>
               
                @forelse($orders as $order)
                
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>${{ $order->total }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at->subHour()->timezone('Asia/Damascus')->format('Y-m-d H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">لا توجد طلبات سابقة</td>
                </tr>
                @endforelse
            </tbody>
             
        </table>
       
    </div>
</div>
@endsection
