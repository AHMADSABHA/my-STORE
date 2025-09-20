@extends('layout.master2')
@section('content')
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">الدفع</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="#">الصفحات</a></li>
        <li class="breadcrumb-item active text-white">الدفع</li>
    </ol>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session('error'))
<div class="alert alert-danger text-center fw-bold">
    {{ session('error') }}
</div>
@endif

<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">تفاصيل الفوترة</h1>
        <form id="checkout-form" action="{{ route('checkout.store') }}" method="POST" novalidate>
            @csrf
            <input type="hidden" name="payment_method" id="payment_method" value="shipping">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7" id="billing-form-section">
                    <!-- بيانات الفوترة -->
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">الاسم الاول<sup>*</sup></label>
                                <input type="text" class="form-control" name="first_name" required >
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">اسم العائلة<sup>*</sup></label>
                                <input type="text" class="form-control" name="last_name" required >
                            </div>
                        </div>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">العنوان <sup>*</sup></label>
                        <input type="text" class="form-control" name="address" placeholder="ادخل العنوان الخاص بسكنكم " required>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">المدينة/البلد<sup>*</sup></label>
                        <input type="text" class="form-control" name="city" required>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">البلد<sup>*</sup></label>
                        <input type="text" class="form-control" name="country" required>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">رقم الهاتف<sup>*</sup></label>
                        <input type="tel" class="form-control" name="phone" required>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">البريد الإلكتروني<sup>*</sup></label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <hr>
                    <div class="form-item">
                        <textarea name="notes" class="form-control" spellcheck="false" cols="30" rows="11" placeholder="ضع ملاحظاتك (اختياري)"></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <!-- جدول المنتجات -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">المنتج</th>
                                    <th scope="col">الاسم</th>
                                    <th scope="col">السعر</th>
                                    <th scope="col">الكمية</th>
                                    <th scope="col">الاجمالي</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $item)
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="{{ asset($item->product->image) }}" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                        </div>
                                    </th>
                                    <td class="py-5">{{ $item->product->name }}</td>
                                    <td class="py-5">${{ $item->product->price }}</td>
                                    <td class="py-5">{{ $item->quantity }}</td>
                                    <td class="py-5">${{ $item->product->price * $item->quantity }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <th scope="row"></th>
                                    <td class="py-5"></td>
                                    <td class="py-5"></td>
                                    <td class="py-5">
                                        <p class="mb-0 text-dark py-3">المجموع</p>
                                    </td>
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark">${{ $subtotal }}</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td class="py-5">
                                       <b> <p class="mb-0 text-dark py-4">الشحن</p></b>
                                    </td>
                                    <td colspan="3" class="py-5">
                                        <div class="form-check text-start">
                                            <input type="checkbox" class="form-check-input bg-primary border-0" checked disabled>
                                            <label class="form-check-label">كلفة الشحن: ${{ $shipping }}</label><br>
                                              <label class="form-check-label"> اونلاين: $0</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td class="py-5">
                                        <p class="mb-0 text-dark text-uppercase py-3">المجموع الكلي +كلفة الشحن</p>
                                    </td>
                                    <td class="py-5"></td>
                                    <td class="py-5"></td>
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark">${{ $total }}</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
@if($cartItems->count() > 0)
                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                      <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">تأكيد الطلب</button>
                    </div>
@endif
                </div>
            </div>
            <div class="modal fade" id="paymentChoiceModal" tabindex="-1" aria-labelledby="paymentChoiceModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
              <div class="modal-header border-0">
                <h5 class="modal-title w-100" id="paymentChoiceModalLabel">اختر طريقة الارسال</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
              </div>
              <div class="modal-body">
                <button type="button" id="online-btn" class="btn btn-success mx-2">أونلاين</button>
                <button type="button" id="shipping-btn" class="btn btn-secondary mx-2">شحن</button>
              </div>
            </div>
          </div>
        </div>
        </form>

        <!-- Bootstrap Modal -->
        

    </div>
</div>

{{-- تأكد أن Bootstrap JS و CSS محمّلان في القالب الرئيسي --}}

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('checkout-form');
    const paymentMethodInput = document.getElementById('payment_method');
    const billingFormSection = document.getElementById('billing-form-section');

    // جميع الحقول داخل قسم بيانات الفوترة التي يمكن أن تكون required
    const billingInputs = billingFormSection.querySelectorAll('input, select, textarea');

    // Bootstrap modal instance
    const paymentChoiceModal = new bootstrap.Modal(document.getElementById('paymentChoiceModal'));

    let paymentChosen = false;

    // دالة لتفعيل أو تعطيل خاصية required على حقول الفوترة
    function toggleBillingRequired(isRequired) {
        billingInputs.forEach(input => {
            if (isRequired) {
                input.setAttribute('required', 'required');
            } else {
                input.removeAttribute('required');
            }
        });
    }

    form.addEventListener('submit', function (e) {
        if (!paymentChosen) {
            e.preventDefault(); // منع الإرسال الأولي
            paymentChoiceModal.show(); // إظهار المودال
        }
        // إذا تم اختيار طريقة الدفع مسبقًا يسمح بالإرسال
    });

    document.getElementById('online-btn').addEventListener('click', function () {
        paymentChosen = true;
        paymentMethodInput.value = 'online';

        // إخفاء بيانات الفوترة لأن الدفع أونلاين لا يحتاجها
        billingFormSection.style.display = 'none';

        // إزالة خاصية required من حقول الفوترة
        toggleBillingRequired(false);

        paymentChoiceModal.hide();

        // إرسال الفورم مباشرة
        form.submit();
    });

    document.getElementById('shipping-btn').addEventListener('click', function () {
        paymentChosen = true;
        paymentMethodInput.value = 'shipping';

        // إظهار بيانات الفوترة لأن الدفع عن طريق الشحن يحتاجها
        billingFormSection.style.display = 'block';

        // تفعيل خاصية required على حقول الفوترة
        toggleBillingRequired(true);

        paymentChoiceModal.hide();

        // لا نرسل الفورم الآن، المستخدم يجب أن يكمل البيانات ثم يضغط تأكيد الطلب مرة أخرى
    });
});
</script>
@endsection
