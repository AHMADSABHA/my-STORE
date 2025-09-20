@extends('dashboard-layout.layout')

@section('page-title', 'اضافة قسم جديد');

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>اضافة قسم جديد</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('categories.list') }}">المنتجات</a></li>
                            <li class="breadcrumb-item active">اضافة قسم جديد</li>
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
                                <h3 class="card-title">اضافة قسم جديد</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="image">صورة القسم</label>
                                        <div class="custom-file">
                                            <input name="image" type="file"
                                                class="custom-file-input @error('image') is-invalid  @enderror"
                                                id="image">
                                            <label class="custom-file-label" for="image">اختر صورة</label>
                                        </div>
                                        @error('image')
                                            <span id="exampleInputEmail1-error" class="error invalid-feedback"
                                                style="display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">اسم القسم</label>
                                        <input name="name" type="text"
                                            class="form-control @error('name') is-invalid  @enderror" id="name"
                                            placeholder="ادخل اسم القسم" value="{{ old('name') }}">
                                        @error('name')
                                            <span id="exampleInputEmail1-error"
                                                class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="description">وصف القسم</label>
                                        <textarea name="description" class="form-control @error('description') is-invalid  @enderror" id="description" placeholder="ادخل وصف المنتج">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="error invalid-feedback" style="display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                   
                                  
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">اضافة</button>
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