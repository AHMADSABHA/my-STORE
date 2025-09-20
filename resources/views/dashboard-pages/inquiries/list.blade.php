@extends('dashboard-layout.layout')

@section('page-title', 'الاستفسارات')
@section('main-content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>الاستفسارات الواردة</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                 <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-end">
                                    @for ($i = 1; $i <= $inquiries->lastPage(); $i++)
                                        <li class="page-item {{ $i == $inquiries->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $inquiries->url($i) }}">{{ $i }}</a>
                                        </li>
                                        
                                    @endfor
                                   <li class="page-item"><a class="page-link" href="{{$inquiries->url($inquiries->lastPage())}}">الأخيرة</a></li>
                                </ul>
                            </div>
                                <table class="table table-bordered align-middle text-center">
                                    <thead class="align-middle">
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>البريد</th>
                                            <th>الرسالة</th>
                                            <th>الصورة</th>
                                            <th>الحالة</th>
                                            <th>تاريخ الإرسال</th>
                                            <th>إجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($inquiries as $inquiry)
                                        <tr @if(!$inquiry->is_read) style="background:#f8f9fa;" @endif>
                                            <td>{{ $inquiry->id }}</td>
                                            <td>{{ $inquiry->name }}</td>
                                            <td>{{ $inquiry->email }}</td>
                                            <td style=" word-break:break-word; white-space:pre-line;">{{ $inquiry->message }}</td>
                                            <td>
                                                @if($inquiry->image)
                                                    <a href="{{ asset('storage/'.$inquiry->image) }}" target="_blank">عرض الصورة</a>
                                                @else
                                                    لا توجد صورة
                                                @endif
                                            <td>{{ $inquiry->is_read ? 'مقروء' : 'جديد' }}</td>
                                            <td>{{ $inquiry->created_at->subHour()->timezone('Asia/Damascus')->format('Y-m-d H:i') }}</td>
                                            <td>
                                                @if(!$inquiry->is_read)
                                                <form action="{{ route('dashboard.inquiries.read', $inquiry->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-success btn-sm">تعليم كمقروء</button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
