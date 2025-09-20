@extends('layout.master2')
@section('content')
<div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">تفاصيل المنتج</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">المنتجات</a></li>
                <li class="breadcrumb-item active text-white">تفاصيل المنتج</li>
            </ol>
        </div>
        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border rounded">
                                    <a href="#">
                                        <img src="{{ asset($product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                
                                <h4 class="fw-bold mb-3">{{ $product->name }}</h4>
                                <p class="mb-3">القسم: {{ $product->category ? $product->category->name : 'بدون قسم' }}</p>
                                <h5 class="fw-bold mb-3">{{ $product->price }} $</h5>
                                <p class="mb-4">{{ $product->description }}</p>
                                <p class="mb-4">مدة التوصيل: {{ $product->delivery_time }}</p>
                                <form action="{{ route('cart.add') }}" method="POST" class="d-inline-flex align-items-center">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
   <div class="input-group-btn">
                        <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border" onclick="this.parentNode.nextElementSibling.stepDown(); ">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                   <input type="number" name="quantity" value="1" min="1" class="form-control d-inline mx-2" style="width:60px;">
   <div class="input-group-btn">
                        <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border" onclick="this.parentNode.previousElementSibling.stepUp(); ">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
    <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary">
        <i class="fa fa-shopping-bag me-2 text-primary"></i> اضافة الى السلة
    </button>
</form>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
          <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h4 class="mb-5 fw-bold">اترك تعليقك</h4>
    <div class="row g-4">
        <div class="col-lg-12">
            <div class="border-bottom rounded my-4">
                <textarea name="comment" class="form-control border-0" cols="30" rows="5" placeholder="تعليقك *" required></textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="d-flex align-items-center mb-3">
                <label class="me-3">يرجى التقييم:</label>
                <select name="rating" class="form-select w-auto" required>
                    <option value="">اختر التقييم</option>
                    @for($i=5; $i>=1; $i--)
                        <option value="{{ $i }}">{{ $i }} نجوم</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="col-lg-12">
            <button type="submit" class="btn border border-secondary text-primary rounded-pill px-4 py-2">إرسال التعليق</button>
        </div>
    </div>
</form>
                                
@endsection