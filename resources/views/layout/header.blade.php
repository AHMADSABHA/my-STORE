<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>حلول أكاديمية </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">ادلب, سوريا</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">ahmadsabha963@gmail.com</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="#" class="text-white"><small class="text-white mx-2">سياسة الخصوصية</small>/</a>
                        <a href="#" class="text-white"><small class="text-white mx-2">شروط الاستخدام</small>/</a>
                        <a href="#" class="text-white"><small class="text-white ms-2">المبيعات والخدمات </small></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">حلول أكاديمية</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    @if(auth()->check())
                                <div class="me-3 my-auto">
                                    <a href="{{route('balance.charge')}}" class="btn btn-outline-success position-relative d-flex align-items-center" style="font-size: 0.95em; padding: 0.35em 0.8em;">
                                        <i class="fas fa-wallet me-1"></i>
                                        <span class="fw-bold">{{ number_format(auth()->user()->balance, 2) }}</span>
                                        <span class="mx-1">$</span>
                                        <span class="badge bg-success ms-2" style="font-size: 1em;">+
                                        </span>
                                    </a>
                                </div>
                            @endif
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{route('home')}}" class="nav-item nav-link active">الرئيسية</a>
                           
                           
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">الصفحات</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    
                                    <a href="{{route('checkout.index')}}" class="dropdown-item">الدفع</a>
                                   <a href="{{route('customer.orders')}}" class="dropdown-item">الطلبات</a>
                                   
                                </div>
                            </div>
                           <a href="{{route('products.index')}}" class="nav-item nav-link">المنتجات</a>

                               <a href="{{route('testimonial.index')}}" class="nav-item nav-link">آراء العملاء</a>
                               
                           
                            <a href="{{route('contact.index')}}" class="nav-item nav-link">تواصل معنا</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                          
                            <a href="{{route('cart.index')}}" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                               @php
    $cartCount = \App\Models\CartItem::where('user_id', auth()->id())->sum('quantity');
@endphp
<span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
      style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
    {{ $cartCount }}
</span>
                            </a>
                            @if(auth()->check() && (auth()->user()->role == 'admin' || auth()->user()->role == 'salesman'))
                                <a href="{{ route('products.list') }}" class="btn btn-primary me-3 my-auto">
                                    <i class="fas fa-cogs"></i> لوحة التحكم
                                </a>
                            @endif
                            @if(!auth()->check())
                                <a href="{{route('login')}}" class="my-auto">
                                    <i class="fas fa-user fa-2x"></i>
                                </a>
                            @endif
                            @if(auth()->check())
                                <form action="{{ route('customer.logout') }}" method="POST" class="my-auto" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn p-0 border-0 bg-transparent my-auto" style="vertical-align: middle;">
                                        <i class="bi bi-box-arrow-left" style="font-size:2em;"></i>
                                    </button>
                                </form>
                            @endif
                            
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">البحث بالكلمات</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->




