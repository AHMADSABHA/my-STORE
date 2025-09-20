<!doctype html>
<html lang="en" class="semi-dark" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('dashboard-assets/images/favicon-32x32.png') }}" type="image/png" />
  <link href="{{ asset('dashboard-assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('dashboard-assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
  <link href="{{ asset('dashboard-assets/css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('dashboard-assets/css/icons.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="{{ asset('dashboard-assets/css/pace.min.css') }}" rel="stylesheet" />
  <title>تسجيل مستخدم جديد</title>
</head>
<body style="background: #f8fafc; min-height: 100vh;">
    <div class="container py-5" style="min-height: 80vh; display: flex; align-items: center; justify-content: center;">
        <div class="row justify-content-center w-100">
            <div class="col-12 col-md-10 col-lg-7">
                @include('layout.header')
                <br><br><br><br><br><hr>
                <div class="card shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h3 class="mb-4 text-center">تسجيل مستخدم جديد</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-body" method="POST" action="{{ route('register.submit') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label class="form-label">الاسم الكامل</label>
                                    <input name="name" type="text" class="form-control" placeholder="الاسم الكامل" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">البريد الإلكتروني</label>
                                    <input name="email" type="email" class="form-control" placeholder="البريد الإلكتروني" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">كلمة المرور</label>
                                    <input name="password" type="password" class="form-control" placeholder="كلمة المرور" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">تأكيد كلمة المرور</label>
                                    <input name="password_confirmation" type="password" class="form-control" placeholder="تأكيد كلمة المرور" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">المهنة</label>
                                    <input name="profession" type="text" class="form-control" placeholder="المهنة">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">رقم الهاتف</label>
                                    <input name="phone" type="text" class="form-control" placeholder="رقم الهاتف">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">العنوان</label>
                                    <input name="address" type="text" class="form-control" placeholder="العنوان">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label">نوع المستخدم</label>
                                    <select name="role" class="form-control" required>
                                        <option value="customer">عميل</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">الصورة الشخصية</label>
                                    <input name="image" type="file" class="form-control" accept="image/*">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary py-2 w-100">تسجيل</button>
                                </div>
                            </div>
                        </form>
                        <div class="d-flex gap-2 mt-3">
                            <a href="{{ route('home') }}" class="btn btn-dark w-100">العودة إلى الصفحة الرئيسية</a>
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
