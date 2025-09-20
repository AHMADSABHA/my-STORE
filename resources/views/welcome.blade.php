@extends('layout.master')
@section('content')
 <div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>أنواع المنتجات المقدمة</h1>
                </div>
                <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-all">
                                <span class="text-dark" style="width: 130px;">جميع المنتجات</span>
                            </a>
                        </li>
                        @php
                            $categories = $collections->pluck('category')->filter()->unique('id');
                        @endphp
                        @foreach($categories as $cat)
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-{{ $cat->id }}">
                                    <span class="text-dark" style="width: 130px;">{{ $cat->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                {{-- جميع المنتجات --}}
                <div id="tab-all" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach ($collections as $item)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        @include('components.product-card', ['item' => $item])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($categories as $cat)
                <div id="tab-{{ $cat->id }}" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach ($collections as $item)
                                    @if ($item->category && $item->category->id == $cat->id)
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            @include('components.product-card', ['item' => $item])
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>      
    </div>
</div>
@endsection
