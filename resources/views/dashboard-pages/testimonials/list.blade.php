@extends('dashboard-layout.layout')

@section('page-title', 'التقييمات')
@section('main-content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>التقييمات الواردة</h1>
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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                       
                                        <th>الاسم</th>
                                        <th>الصفة</th>
                                        <th>الرسالة</th>
                                        <th>التقييم</th>                                      
                                        <th>تاريخ الإرسال</th>
                                        <th>إجراء</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($testimonials as $testimonial)
                                    <tr>
                                        <td>{{ $testimonial->client_name }}</td>
                                        <td>{{ $testimonial->profession }}</td>
                                        <td>{{ $testimonial->comment }}</td>
                                        <td>
                                            @for($i = 1; $i <= 5; $i++)
                                            @if($i<=$testimonial->rating && $testimonial->rating<=2)
                                               <i class="bi bi-star-fill{{ $i <= $testimonial->rating ? ' text-danger' : ' text-secondary' }}"></i>
                                                @else
                                                 <i class="bi bi-star-fill{{ $i <= $testimonial->rating ? ' text-primary' : ' text-secondary' }}"></i>
                                                 @endif
                                            @endfor
                                        </td>

                                        <td>{{ $testimonial->created_at->subHour()->timezone('Asia/Damascus')->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <form action="{{ route('testimonials.delete', $testimonial->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">حذف</button>
                                            </form>
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
    </section>
</div>
@endsection

                                     
                             
