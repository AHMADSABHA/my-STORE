@extends('dashboard-layout.layout')

@section('page-title', 'تعديل المنتج');

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>تعديل المنتج</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('products.list') }}">المنتجات</a></li>
                            <li class="breadcrumb-item active">تعديل المنتج</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">تعديل المنتج</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('products.update', ['id' => $product['id']]) }} "  method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">اسم المنتج</label>
                                        <input name="name" type="text" class="form-control @error('name') is-invalid  @enderror" id="name" placeholder="ادخل اسم المنتج" value="{{ old('name', $product->name ?? '') }}">
                                        @error('name')
                                            <span class="error invalid-feedback" style="display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                     <div class="form-group">
                                        <label for="name">صورة المنتج</label>
                                        <input name="image" type="file" class="form-control @error('image') is-invalid  @enderror" id="image">
                                        @error('image')
                                            <span class="error invalid-feedback" style="display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">القسم</label>
                                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                            <option value="">اختر القسم</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id ?? '') == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="error invalid-feedback" style="display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">وصف المنتج</label>
                                        <textarea name="description" class="form-control @error('description') is-invalid  @enderror" id="description" placeholder="ادخل وصف المنتج">{{ old('description', $product->description ?? '') }}</textarea>
                                        @error('description')
                                            <span class="error invalid-feedback" style="display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="price">السعر</label>
                                        <input name="price" type="number" step="0.01" class="form-control @error('price') is-invalid  @enderror" id="price" placeholder="ادخل سعر المنتج" value="{{ old('price', $product->price ?? '') }}">
                                        @error('price')
                                            <span class="error invalid-feedback" style="display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="delivery_time">مدة التسليم (بالأيام)</label>
                                        <input name="delivery_time" type="number" class="form-control @error('delivery_time') is-invalid  @enderror" id="delivery_time" placeholder="ادخل مدة التسليم" value="{{ old('delivery_time', $product->delivery_time ?? '') }}">
                                        @error('delivery_time')
                                            <span class="error invalid-feedback" style="display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">تعديل</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection