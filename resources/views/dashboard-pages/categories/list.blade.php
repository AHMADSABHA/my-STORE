@extends('dashboard-layout.layout')

@section('page-title', 'قائمة الاقسام');

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>الاقسام</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">الاقسام</li>
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
                                <a href="{{ route('categories.add') }}" class="btn btn-dark">إضافة قسم جديد</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center align-middle">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الصورة</th>
                                                <th>اسم القسم</th>
                                                <th>الوصف</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>
                                                    @if($category->image)
                                                        <img src="{{ asset($category->image) }}" alt="صورة القسم" width="50" height="50">
                                                    @endif
                                                </td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->description }}</td>
                                                <td>
                                                    <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-outline-warning btn-xs">تعديل</a>
                                                    <br />
                                                    <form action="{{ route('categories.delete', ['id' => $category->id]) }}" method="POST" style="display:inline-block;">
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
                                    @for ($i = 1; $i <= $categories->lastPage(); $i++)
                                        <li class="page-item {{ $i == $categories->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $categories->url($i) }}">{{ $i }}</a>
                                        </li>
                                        
                                    @endfor
                                   <li class="page-item"><a class="page-link" href="{{$categories->url($categories->lastPage())}}">الأخيرة</a></li>
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