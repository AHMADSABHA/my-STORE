@extends('dashboard-layout.layout')

@section('page-title', 'تعديل القسم');

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
                            <li class="breadcrumb-item active"><a href="{{ route('categories.list') }}">الاقسام</a></li>
                            <li class="breadcrumb-item active">تعديل القسم</li>
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
                                <h3 class="card-title">تعديل القسم</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('categories.update', ['id' => $category['id']]) }} "  method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">اسم القسم</label>
                                        <input name="name" type="text" class="form-control @error('name') is-invalid  @enderror" id="name" placeholder="ادخل اسم القسم" value="{{ old('name', $category->name ?? '') }}">
                                        @error('name')
                                            <span class="error invalid-feedback" style="display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                     <div class="form-group">
                                        <label for="name">صورة القسم</label>
                                        <input name="image" type="file" class="form-control @error('image') is-invalid  @enderror" id="image">
                                        @error('image')
                                            <span class="error invalid-feedback" style="display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="description">وصف القسم</label>
                                        <textarea name="description" class="form-control @error('description') is-invalid  @enderror" id="description" placeholder="ادخل وصف القسم">{{ old('description', $category->description ?? '') }}</textarea>
                                        @error('description')
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