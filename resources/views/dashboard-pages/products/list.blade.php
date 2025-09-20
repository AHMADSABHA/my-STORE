@extends('dashboard-layout.layout')

@section('page-title', 'قائمة المنتجات');

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Services</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                            <li class="breadcrumb-item active">المنتجات</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container py-4">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <a href="{{ route('products.add') }}" class="btn btn-dark">إضافة منتج جديد</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center align-middle">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الصورة</th>
                                                <th>اسم المنتج</th>
                                                <th>القسم</th>
                                                <th>الوصف</th>
                                                <th>السعر</th>
                                                <th>مدة التسليم</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>
                                                    @if($product->image)
                                                        <img src="{{ asset($product->image) }}" alt="صورة المنتج" width="50" height="50">
                                                    @endif
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->category ? $product->category->name : '-' }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->delivery_time }}</td>
                                                <td>
                                                    <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-outline-warning btn-xs">تعديل</a>
                                                    <br />
                                                    <form action="{{ route('products.delete', ['id' => $product->id]) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-xs">حذف</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-end">
                                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                                        <li class="page-item {{ $i == $products->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                        </li>
                                        
                                    @endfor
                                   <li class="page-item"><a class="page-link" href="{{$products->url($products->lastPage())}}">الأخيرة</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection