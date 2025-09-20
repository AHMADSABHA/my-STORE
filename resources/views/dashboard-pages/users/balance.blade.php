@extends('dashboard-layout.layout')
@section('page-title', 'تعديل أرصدة المستخدمين')
@section('main-content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>تعديل أرصدة المستخدمين</h1>
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
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                             <div class="card-footer clearfix">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm justify-content-center m-0 d-flex flex-row">
                @for ($i = 1; $i <= $users->lastPage(); $i++)
                    <li class="page-item {{ $i == $users->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item">
                    <a class="page-link" href="{{ $users->url($users->lastPage()) }}">الأخيرة</a>
                </li>
            </ul>
        </nav>
    </div>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center align-middle">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>النوع</th>
                                            <th>البريد</th>
                                            <th>الرصيد الحالي</th>
                                            <th>تعديل الرصيد</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                <form action="{{ route('dashboard.users.role.update', $user->id) }}" method="POST" class="d-flex align-items-center" style="gap:5px;">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="role" class="form-select form-select-sm" style="width:120px;">
                                                        <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>زبون</option>
                                                        <option value="salesman" {{ $user->role == 'salesman' ? 'selected' : '' }}>مندوب مبيعات</option>

                                                    </select>
                                                    <button class="btn btn-secondary btn-sm" title="تغيير الدور">تحديث</button>
                                                </form>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->balance }}</td>
                                            <td>
                                                <form action="{{ route('dashboard.users.balance.update', $user->id) }}" method="POST" class="d-flex justify-content-center align-items-center">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="number" name="balance" value="{{ $user->balance }}" min="0" step="0.01" class="form-control mx-2" style="width:120px;">
                                                    <button class="btn btn-primary btn-sm">تحديث</button>
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
        </div>
    </section>
</div>
@endsection
