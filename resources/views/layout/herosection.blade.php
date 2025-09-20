<!-- Hero Start -->
<div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7">
                <h4 class="mb-3 text-secondary">100% خدمات مميزة</h4>
                <h1 class="mb-5 display-3 text-primary">جودة في الاداء</h1>
                <div class="position-relative mx-auto">
                    <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number" placeholder="ابحث">
                    <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">ارسال الان</button>
                </div>
            </div>
            <div class="col-md-12 col-lg-5">
                <div class="position-relative">
                    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox" style="min-height: 320px; border-radius: 15px;">
                            @foreach ($categories as $index => $category)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }} rounded position-relative">
                                    <img src="{{ $category->image }}" class="img-fluid w-100 h-100 bg-secondary rounded" alt="{{ $category->name }}" style="object-fit: cover; max-height: 320px;">
                                    <!-- زر القسم في منتصف السلايدر بدون امتداد -->
                                    <a href="#" class="btn px-4 py-2 text-white rounded position-absolute d-flex align-items-center justify-content-center"
                                       style="top: 50%; left: 50%; transform: translate(-50%, -50%); background: linear-gradient(rgba(255, 181, 36, 0.7), rgba(255, 181, 36, 0.7)); min-width: 120px; min-height: 45px;">
                                        {{ $category->name }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                  
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev"
                            style="top: 50%; left: 10px; transform: translateY(-50%); width: 40px; height: 40px; background: #8fd18f; border-radius: 50%; opacity: 0.9;">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">السابق</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next"
                            style="top: 50%; right: 10px; transform: translateY(-50%); width: 40px; height: 40px; background: #8fd18f; border-radius: 50%; opacity: 0.9;">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">التالي</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->
