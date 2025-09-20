<!doctype html>
<html lang="en" class="semi-dark" dir="rtl">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('dashboard-assets/images/favicon-32x32.png') }}" type="image/png" />
  <!-- Bootstrap CSS -->
  <link href="{{ asset('dashboard-assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('dashboard-assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
  <link href="{{ asset('dashboard-assets/css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('dashboard-assets/css/icons.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="{{ asset('dashboard-assets/css/pace.min.css') }}" rel="stylesheet" />

  <title> تسجيل الدخول</title>
</head>


<body style="background: #f8fafc; min-height: 100vh;">
    <div class="container py-5" style="min-height: 80vh; display: flex; align-items: center; justify-content: center;">
        <div class="row justify-content-center w-100">
            <div class="col-12 col-md-8 col-lg-5">
                 @include('layout.header')
                <br><br><br><br><br><hr>
                <div class="card shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h3 class="mb-4 text-center">تسجيل الدخول</h3>
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-body" method="POST" action="{{ route('customer.login.submit') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="inputEmailAddress" class="form-label">البريد الإلكتروني</label>
                                    <input name="email" type="email" class="form-control" id="inputEmailAddress" placeholder="البريد الإلكتروني" required autofocus>
                                </div>
                                <div class="col-12">
                                    <label for="inputChoosePassword" class="form-label">كلمة المرور</label>
                                    <input name="password" type="password" class="form-control" id="inputChoosePassword" placeholder="أدخل كلمة المرور" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary py-2 w-100">تسجيل الدخول</button>
                                </div>
                            </div>
                        </form>
                        <div class="d-flex gap-2 mt-3">
                            <a href="{{ route('customer.register') }}" class="btn btn-dark w-50">إنشاء حساب جديد</a>
                            <a href="{{ route('home') }}" class="btn btn-dark w-50">العودة إلى الصفحة الرئيسية</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card {
            border-radius: 1.5rem;
        }
        .btn-primary {
            background: #2dce89;
            border: none;
            font-weight: 500;
            border-radius: 1rem;
        }
        .btn-primary:hover {
            background: #1abc70;
        }
        .btn-dark {
            background: #2d3a4b;
            border-radius: 1rem;
            border: none;
            font-weight: 500;
        }
        .btn-dark:hover {
            background: #1a2233;
        }
        .alert {
            border-radius: 1rem;
        }
        @media (max-width: 600px) {
            .card-body { padding: 1.2rem !important; }
            .card { border-radius: 1rem; }
        }
    </style>
</body>

</html>