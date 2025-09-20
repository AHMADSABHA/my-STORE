<!--start top header-->
<header class="top-header">        
  <nav class="navbar navbar-expand gap-3">
    <div class="mobile-toggle-icon fs-3">
        <i class="bi bi-list"></i>
      </div>
      
      <div class="top-navbar-right ms-auto">
        <ul class="navbar-nav align-items-center">
          
        <div>
          <form action="{{ route('customer.logout') }}" method="POST" >
            @csrf
        <input type="submit" class="btn btn-dark" value="تسجيل الخروج">
        </form>
        </div>
{{-- <div>
          <form action="{{ route('balance.charge') }}" method="GET" >
            @csrf
        <input type="submit" class="btn btn-success" value="شحن الرصيد">
        </form>
</div> --}}
<li class="nav-item position-relative me-3">
    <a href="{{ route('dashboard.balance.topup-requests') }}" class="nav-link">
        <i class="bi bi-lightning-charge-fill fs-4 text-primary"></i>
        @php
            $pendingTopups = \App\Models\BalanceTopupRequest::where('status', 'pending')->count();
        @endphp
        @if($pendingTopups > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $pendingTopups }}
            </span>
        @endif
    </a>
</li>
@if(\App\Models\User::where('id', auth()->id())->value('role') == 'admin')
   <li class="nav-item position-relative me-3">
    <a href="{{ route('dashboard.inquiries') }}" class="nav-link">
        <i class="bi bi-question-square fs-4 text-primary"></i>
        @php
            $inquiries = \App\Models\Inquiry::where('is_read', false)->count();
        @endphp
        @if($inquiries > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $inquiries }}
            </span>
        @endif
    </a>
</li>     
    @endif    
        </ul>
        </div>
  </nav>
</header>
 <!--end top header-->