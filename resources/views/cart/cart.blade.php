@extends('layout.master2')
@section('content')
 <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">سلة المنتجات</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="#">الصفحات</a></li>
                <li class="breadcrumb-item active text-white">سلة المنتجات</li>
            </ol>
        </div>

        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">المنتجات</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">السعر</th>
                            <th scope="col">الكمية</th>
                            <th scope="col">الكلي</th>
                            <th scope="col">الاجراءات</th>
                          </tr>
                        </thead>
                       <tbody>
    @forelse($cartItems as $item)
    <tr>
        <th scope="row">
            <div class="d-flex align-items-center">
                <img src="{{ asset($item->product->image) }}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
            </div>
        </th>
        <td>
            <p class="mb-0 mt-4">{{ $item->product->name }}</p>
        </td>
        <td>
            <p class="mb-0 mt-4">{{ $item->product->price }} $</p>
        </td>
        <td>
            <form action="{{ route('cart.update', $item) }}" method="POST" class="d-inline">
                @csrf
                @method('PUT')
                <div class="input-group quantity mt-4" style="width: 100px;">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border" onclick="this.parentNode.nextElementSibling.stepDown(); this.form.submit();">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="number" name="quantity" class="form-control form-control-sm text-center border-0" value="{{ $item->quantity }}" min="1" onchange="this.form.submit();">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border" onclick="this.parentNode.previousElementSibling.stepUp(); this.form.submit();">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </form>
        </td>
        <td>
            <p class="mb-0 mt-4">{{ $item->product->price * $item->quantity }} $</p>
        </td>
        <td>
            <form action="{{ route('cart.remove', $item) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-md rounded-circle bg-light border mt-4">
                    <i class="fa fa-times text-danger"></i>
                </button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6" class="text-center">لا توجد منتجات في السلة</td>
    </tr>
    @endforelse
</tbody>
                    </table>
                </div>
               
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                {{-- <h1 class="display-6 mb-4">سلتي <span class="fw-normal">الكل</span></h1> --}}
                                <div class="d-flex justify-content-between mb-4">
    <h5 class="mb-0 me-4">المجموع:</h5>
    <p class="mb-0">${{ $subtotal }}</p>
</div>
<div class="d-flex justify-content-between">
    <h5 class="mb-0 me-4">الشحن</h5>
    <div class="">
        <p class="mb-0">سعر ثابت: ${{ $shipping }}</p>
    </div>
</div>
...
<div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
    <h5 class="mb-0 ps-4 me-4">الإجمالي</h5>
    <p class="mb-0 pe-4">${{ $total }}</p>
</div>
<a href="{{ route('checkout.index') }}">
    @if ($cartItems->count() > 0)
                            <button type="submit" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4">تأكيد الدفع</button>
    @endif
</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection