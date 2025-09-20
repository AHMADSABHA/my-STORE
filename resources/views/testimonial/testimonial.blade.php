@extends('layout.master2')
@section('content')
 <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">التقييمات والاراء</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="#">الصفحات</a></li>
                <li class="breadcrumb-item active text-white">التقييمات</li>
            </ol>
        </div>
       <div class="container-fluid testimonial py-5">
            <div class="container py-5">
                <div class="testimonial-header text-center">
                    <h4 class="text-primary">تقييمنا</h4>
                    <h1 class="display-5 mb-5 text-dark">آراء العملاء الكرام</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    @foreach($testimonials as $testimonial)
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0">{{ $testimonial->comment }}</p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                               <div class="bg-secondary rounded">
    @if($testimonial->image)
        @if(Str::startsWith($testimonial->image, 'img/')) 
            <img src="{{ asset($testimonial->image) }}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
         @else
            <img src="{{ asset('storage/'.$testimonial->image) }}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
        @endif 
    @else
        <img src="{{ asset('img/testimonial-1.jpg') }}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
    @endif
</div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark">{{ $testimonial->client_name }}</h4>
                                    <p class="m-0 pb-3">{{ $testimonial->profession }}</p>
                                    <div class="d-flex pe-5">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star{{ $i <= $testimonial->rating ? ' text-primary' : '' }}"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
           
@endsection