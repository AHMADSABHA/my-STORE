@extends('dashboard-layout.layout')

@section('page-title', 'قائمة الفواتير');
@section('main-content')
<div class="container py-5">
    <h2 class="mb-4">قائمة الفواتير</h2>
    <div class="table-responsive">
        <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-end">
                                    @for ($i = 1; $i <= $orders->lastPage(); $i++)
                                        <li class="page-item {{ $i == $orders->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $orders->url($i) }}">{{ $i }}</a>
                                        </li>
                                        
                                    @endfor
                                   <li class="page-item"><a class="page-link" href="{{$orders->url($orders->lastPage())}}">الأخيرة</a></li>
                                </ul>
                            </div>
        <table class="table">
            <thead>
                <tr>
                    <th>رقم الطلب</th>
                    <th>اسم العميل</th>
                    <th>المنتجات</th>
                    <th>المجموع</th>
                    <th>الحالة</th>
                    <th>تاريخ الطلب</th>
                </tr>
            </thead>
            <tbody>
               
                @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? '-' }}</td>
                    <td>
  <ol style="padding-left: 15px; margin: 0;">
    @foreach ($order->orderItems as $item)
      <li>{{ $item->product_name }} (x{{ $item->quantity }})</li>
    @endforeach
  </ol>
</td>
                  
                    <td>${{ $order->total }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at->subHour()->timezone('Asia/Damascus')->format('Y-m-d H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">لا توجد طلبات سابقة</td>
                </tr>
                @endforelse
            </tbody>
        </table>
         
    </div>
</div>
@endsection
