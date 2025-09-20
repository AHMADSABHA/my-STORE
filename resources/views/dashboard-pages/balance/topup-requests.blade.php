@extends('layout.master2')
@section('content')
<div class="container py-5">
    <h2 class="mb-4">طلبات شحن الرصيد</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <br><br>
    <div class="card-footer clearfix">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm justify-content-center m-0 d-flex flex-row">
                @for ($i = 1; $i <= $requests->lastPage(); $i++)
                    <li class="page-item {{ $i == $requests->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $requests->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item">
                    <a class="page-link" href="{{ $requests->url($requests->lastPage()) }}">الأخيرة</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>المستخدم</th>
                    <th>رابط الدفع</th>
                    <th>العملة</th>
                    <th>المبلغ</th>
                    <th>رقم الإيصال</th>
                    <th>الهاتف</th>
                    <th>ملاحظات</th>
                    <th>الحالة</th>
                    <th>تغيير الحالة</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $req)
                <tr>
                    <td>{{ $req->id }}</td>
                    <td>{{ $req->user->name ?? '-' }}</td>
                    <td><a href="{{ $req->payment_link }}" target="_blank">رابط</a></td>
                    <td>{{ $req->currency }}</td>
                    <td>{{ $req->amount }}</td>
                    <td>{{ $req->payment_receipt }}</td>
                    <td>{{ $req->phone }}</td>
                    <td>{{ $req->notes }}</td>
                    <td>
                        @if($req->status == 'pending')
                            <span class="badge bg-warning">بانتظار</span>
                        @elseif($req->status == 'approved')
                            <span class="badge bg-success">مقبول</span>
                        @else
                            <span class="badge bg-danger">مرفوض</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('dashboard.balance.topup-requests.update', $req->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" class="form-select form-select-sm mb-2">
                                <option value="pending" @if($req->status=='pending') selected @endif>بانتظار</option>
                                <option value="approved" @if($req->status=='approved') selected @endif>مقبول</option>
                                <option value="rejected" @if($req->status=='rejected') selected @endif>مرفوض</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary">تحديث</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
