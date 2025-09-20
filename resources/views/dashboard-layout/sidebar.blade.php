<!--start sidebar -->
<aside class="sidebar-wrapper"data-simplebar="true" >
  <div class="sidebar-header">
    {{-- <div>
      <img src="{{ asset('dashboard-assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
    </div> --}}
    <div>
      <h4 class="logo-text">حلول أكاديمية</h4>
    </div>
    <div class="toggle-icon ms-auto" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="bi bi-list" ></i>
    </div>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu" >
    <li>
      <a href="">
       
        <div class="menu-title" >لوحة التحكم</div>
        <div><i class="bi bi-house-fill"></i></div>
      </a>
      
    </li>
    {{-- <li>
      <a href="#" class="has-arrow">
        <div class="parent-icon"> Basic sections
        </div>
        <div class=""><i class="bi bi-grid-fill"></i></div>
      </a>
      <ul>
        <li> <a href="">Hero</a>
        </li>
        <li> <a href=">What We Do</a>
        </li>
        <li> <a href="">Features</a>
        </li>
        <li> <a href="">Working Module</a>
        </li>
        <li> <a href="">How We Are</a>
        </li>
        <li> <a href="">process</a>
        </li>
        <li> <a href="">Contact</a>
        </li>
        <li> <a href="#">Project Contact</a>
        </li>
      </ul>
    </li> --}}
    
      <a href="{{ route('products.list') }}">
        <div class="menu-title"> المنتجات
        </div>
        <div> <i class="bi bi-box"></i></div>
      </a>
    </li>
    {{-- <li>
      <a href="">
        <div class="parent-icon"> Best Skills
        </div>
        <div class=""><i class="bi bi-award"></i></div>
      </a>
    </li> --}}
    <li>
      <a href="{{route('dashboard.stats')}}">
        <div class="menu-title"> إحصائيات الموقع
        </div>
        <div><i class="bi bi-activity"></i></div>
      </a>
    </li>
    <li>
      <a href="{{ route('categories.list') }}">
        <div class="menu-title"> الاقسام
        </div>
        <div><i class="bi bi-person-workspace"></i></div>
      </a>
    </li>
    {{-- <li>
      <a href=""> About Us
        <div class="parent-icon">
        </div>
        <div class=""><i class="bi bi-people-fill"></i></div>
      </a>
    </li>
    <li>
      <a href="">
        <div class="parent-icon"> TEAMS
        </div>
        <div class=""><i class="bi bi-person"></i></div>
      </a>
    </li> --}}
    <li>
      <a href="{{ route('testimonials.list') }}">
        <div class="menu-title">اراء العملاء
        </div>
        <div><i class="bi bi-clipboard2-data"></i></div>
      </a>
    </li>
    <li>
      <a href="{{route('customer.orderslist')}}">
        <div class="menu-title">قائمة الفواتير 
        </div>
        <div><i class="bi bi-clipboard-pulse"></i></div>
      </a>
    </li>
    
    <li>
      <a href="{{route('dashboard.users.balance')}}">
        <div class="menu-title">  الارصدة 
        </div>
        <div><i class="bi bi-file-earmark-post"></i></div>
      </a>
    </li>
    {{-- <li>
      <a href="">
        <div class="parent-icon">BLOGS
        </div>
        <div class=""><i class="bi bi-file-post"></i></div>
      </a>
    </li>
    <li>
      <a href="">
        <div class="parent-icon">PLANS
        </div>
        <div class=""><i class="bi bi-graph-up-arrow"></i></div>
      </a>
    </li> --}}
  </ul>
  <!--end navigation-->
</aside>
<!--end sidebar -->