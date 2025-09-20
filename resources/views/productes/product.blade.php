@extends('layout.master2')

@section('content')
<div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">منتجاتنا</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">الصفحات</a></li>
                <li class="breadcrumb-item active text-white">المنتجات</li>
            </ol>
        </div>
        <br>
   <div id="tab-1" class="tab-pane fade show p-0 active ">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    @foreach ($collections as $item)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex align-items-stretch">
                            <div class="rounded position-relative fruite-item w-100 h-100 d-flex flex-column" style="max-width: 320px; margin: 0 auto; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                                <div class="fruite-img" style="height:140px; display:flex; align-items:center; justify-content:center; background:#f8f9fa; padding: 8px;">
                                    <a href="{{ route('products.details', $item->id) }}">
                                        <img src="{{ asset($item->image) }}" class="img-fluid rounded-top" alt="" style="max-height:110px; max-width:100%; object-fit:contain;">
                                    </a>
                                </div>
                                <div class="text-white bg-secondary px-2 py-1 rounded position-absolute" style="top: 8px; left: 8px; font-size:0.85rem;">
                                    {{ $item->category ? $item->category->name : 'بدون قسم' }}
                                </div>
                                <div class="p-2 border border-secondary border-top-0 rounded-bottom flex-grow-1 d-flex flex-column justify-content-between">
                                    <div>
                                        <h6 class="mb-1" style="font-size:1rem;">{{ $item->name }}</h6>
                                        <p class="mb-1" style="font-size:0.92rem; min-height:32px;">{{ $item->description }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap mt-auto gap-1">
                                        <span class="text-dark fw-bold">{{ $item->price }}$</span>
                                        <span class="text-dark fw-bold">{{ $item->delivery_time }} يوم</span>
                                    </div>
                                    <form action="{{ route('cart.add') }}" method="POST" class="d-flex align-items-center justify-content-center gap-1 mt-2">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border" onclick="this.parentNode.querySelector('input[type=number]').stepDown(); "><i class="fa fa-minus"></i></button>
                                        <input type="number" name="quantity" value="1" min="1" class="form-control form-control-sm text-center mx-1" style="width:45px;">
                                        <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border" onclick="this.parentNode.querySelector('input[type=number]').stepUp(); "><i class="fa fa-plus"></i></button>
                                        <button type="submit" class="btn border border-secondary rounded-pill px-2 text-primary ms-2" style="font-size:0.95rem;">
                                            <i class="fa fa-shopping-bag me-1 text-primary"></i> إضافة
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                 
            </div>
        </div>
    </div> 
 <div class="card-footer clearfix">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm justify-content-center m-0 d-flex flex-row">
                @for ($i = 1; $i <= $collections->lastPage(); $i++)
                    <li class="page-item {{ $i == $collections->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $collections->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item">
                    <a class="page-link" href="{{ $collections->url($collections->lastPage()) }}">الأخيرة</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection