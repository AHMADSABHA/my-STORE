@extends('layout.master2')
<br><br>
@section('content')
<div class="container py-5" style="margin-top: 100px; min-height: 70vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                     <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                    <h3 class="mb-4 text-center">شحن الرصيد</h3>
                    <div class="text-center mb-4">
                        <img src="/img/barcode.png" alt="باركود الدفع" style="max-width:180px;max-height:180px;">
                    </div>
                    <form action="{{ route('balance.charge.store') }}" method="POST">
                        @csrf
                        <div class="mb-3 text-center">
                            <span class="fw-bold">رصيدك الحالي:</span>
                            <span class="badge bg-success fs-5">{{ number_format(auth()->user()->balance, 2) }} $</span>
                        </div>
                        <div class="row g-3">
                         <div class="col-md-6" style="position: relative; max-width: 400px;">
  <label class="form-label">رابط الدفع <sup>*</sup></label>
  <input type="text" class="form-control" id="paymentLink" name="payment_link" value="bd52ed5403feb15025ee34b1f6f0bee2" readonly required style="padding-right: 60px;">
  <button type="button" onclick="copyPaymentLink()" 
    style="
      position: absolute;
      top: 72%;
      right: 10px;
      transform: translateY(-50%);
      padding: 6px 12px;
      background-color: #35b826;
      border: none;
      border-radius: 10px;
      color: white;
      cursor: pointer;
      box-shadow: 0 2px 6px rgba(0, 123, 255, 0.4);
      transition: background-color 0.3s ease;
      font-weight: 600;
      font-size: 14px;
      user-select: none;
    "
    onmouseover="this.style.backgroundColor='#0056b3'"
    onmouseout="this.style.backgroundColor='#35b826'">
    نسخ
  </button>
</div>
                            <div class="col-md-6">
                                <label class="form-label">نوع العملة <sup>*</sup></label>
                                <select class="form-control" name="currency" required>
                                    <option value="USD">دولار أمريكي (USD)</option>
                                    {{-- <option value="SYP">ليرة سورية (SYP)</option> --}}
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">المبلغ <sup>*</sup></label>
                                <input type="number" step="0.01" class="form-control" name="amount" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">رقم ايصال الدفع<sup>*</sup></label>
                                <input type="text" class="form-control" name="payment_receipt" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">رقم الهاتف<sup>*</sup></label>
                                <input type="tel" class="form-control" name="phone" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">ملاحظات (اختياري)</label>
                                <textarea name="notes" class="form-control" rows="3" placeholder="ضع ملاحظاتك (اختياري)"></textarea>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <button type="submit" class="btn btn-primary py-3 px-4 w-100">تأكيد الشحن</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection
<script>
  function copyPaymentLink() {
    const input = document.getElementById('paymentLink');
    input.select();
    input.setSelectionRange(0, 99999); 

    try {
      const successful = document.execCommand('copy');
      if (successful) {
        alert('تم نسخ الرابط!');
      } else {
        alert('فشل النسخ، حاول مرة أخرى.');
      }
    } catch (err) {
      alert('متصفحك لا يدعم النسخ التلقائي.');
    }
    window.getSelection().removeAllRanges();
  }
</script>