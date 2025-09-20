@extends('layout.master2')
@section('content')
 <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">التواصل</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="#">الصفحات</a></li>
                <li class="breadcrumb-item active text-white">التواصل </li>
            </ol>
        </div>
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h1 class="text-primary">الموقع الخاص بنا</h1>
                                <p class="mb-4">اذا كان لديك اي استفسار لا تتردد في التواصل معنا عبر النموذج ادناه وسنقوم بالرد عليك في اقرب وقت ممكن.</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="h-100 rounded">
                                <iframe class="rounded w-100" 
                                style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3362.091393698614!2d36.7747889!3d35.9976585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1525129c2fb0bd5b%3A0x43096d4b57211142!2z2KfZhNmF2K3Yp9mB!5e0!3m2!1sar!2s!4v1694259649153!5m2!1sar!2s" 
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form action="{{ route('inquiries.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="name" class="w-100 form-control border-0 py-3 mb-4" placeholder="ادخل اسمك" required>
                                <input type="email" name="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="البريد الخاص بك" required>
                                <textarea name="message" class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="رسالتك" required></textarea>
                                <input type="file" name="image" accept="image/*" class="w-100 form-control border-0 py-3 mb-4">
                                <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">ارسال</button>
                            </form>
                        </div>
                        <div class="col-lg-5">
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>العنوان</h4>
                                    <p class="mb-2"> ادلب.سوريا</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>الايميل الخاص بنا</h4>
                                    <p class="mb-2">ahmadsabha963@gmail.com</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded bg-white">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>هاتف التواصل </h4>
                                    <p class="mb-2">(+963) 949 210 485</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection