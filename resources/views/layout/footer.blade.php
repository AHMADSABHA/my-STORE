

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="#">
                                <h1 class="text-primary mb-0">خدمات</h1>
                                <p class="text-secondary mb-0">ترجمات</p>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mx-auto">

                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="email" placeholder="البريد الإلكتروني الخاص بك">
                                <a href="{{ route('customer.register') }}" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">سجل الآن</a>
                                {{-- <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">سجل الآن</button> --}}
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-end pt-3">
                                <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="#"><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-secondary btn-md-square rounded-circle" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                       <div class="footer-item">
  <h4 class="text-light mb-3">لماذا نحن!</h4>
  <p class="mb-4" id="text-content">
    في عالم التعليم الجامعي المتغير والمتسارع، نعلم جيدًا أن الطالب يحتاج إلى دعم موثوق واحترافي يساعده على تحقيق أهدافه الأكاديمية بكفاءة وسرعة. <strong>[حلول أكاديمية]</strong> هو وجهتك الأمثل للحصول على خدمات جامعية مصغرة متخصصة، مصممة خصيصًا لتلبية احتياجاتك التعليمية بأعلى جودة وأفضل الأسعار.
    <span id="dots">...</span>
    <span id="more-text" style="display: none;text-direction: rtl; text-align: right;">
      <br><br>
     <b> <strong style="font-size: 20px;">ما الذي يميزنا؟</strong></b><br>
      خدمات جامعية مصغرة متكاملة: نقدم مجموعة متنوعة من الخدمات الأكاديمية المصغرة مثل إعداد الأبحاث، الملخصات، العروض التقديمية، والواجبات، مع ضمان الدقة والاحترافية.<br>
      استشارات أكاديمية متخصصة: فريقنا من الخبراء مستعد لتقديم استشارات تعليمية تساعدك في اختيار المسار الصحيح، تطوير مهارات الدراسة، وتحسين الأداء الأكاديمي.<br>
      جودة مضمونة وسرعة في التنفيذ: نلتزم بتسليم الخدمات في الوقت المحدد مع الحفاظ على أعلى معايير الجودة، لضمان رضاك التام.<br>
      دعم فني وتعليمي مستمر: نحن هنا لدعمك في كل خطوة، مع تواصل مباشر وسريع لضمان تجربة سلسة ومميزة.<br>
      أسعار تنافسية وخيارات مرنة: نوفر لك باقات وخيارات تناسب ميزانيتك وتلبي جميع احتياجاتك الأكاديمية.<br><br>
      <strong style="font-size: 20px; text-align: justify;">رؤيتنا</strong><br>
      نسعى لأن نكون الشريك الأكاديمي الأول للطلاب الذين يبحثون عن حلول تعليمية مبتكرة وسريعة، تساعدهم على التفوق والنجاح في مسيرتهم الجامعية.<br><br>
      <strong>[حلول أكاديمية ]</strong> هو اختيارك الأمثل لأننا نفهم تحدياتك ونعمل على تسهيلها من خلال خدمات متخصصة تدعم تطورك الأكاديمي.
    </span>
  </p>
  <button onclick="toggleText()" id="readMoreBtn" class="btn border-secondary py-2 px-4 rounded-pill text-primary">اقرأ المزيد</button>
</div>

                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">معلومات التسوق</h4>
                            <a class="btn-link" href="#">حول</a>
                            <a class="btn-link" href="{{route('contact.index')}}">تواصل معنا </a>
                            <a class="btn-link" href="#">الخصوصية</a>
                            <a class="btn-link" href="#">الشروط والاحكام</a>
                            <a class="btn-link" href="#">سياسة الارجاع</a>
                            <a class="btn-link" href="#">FAQs & Help</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">الحساب</h4>
                            @if(auth()->check()==true)
                            <a class="btn-link" href="{{route('home')}}">حسابي</a>
                            @else
                            <a class="btn-link" href="{{route('login')}}">حسابي</a>
                           @endif
                            <a class="btn-link" href="{{route('cart.index')}}">سلة التسوق</a>
                            <a class="btn-link" href="{{route('customer.orders')}}">تاريخ الطلبات</a>
                            <a class="btn-link" href="{{route('checkout.index')}}">قائمة الطلبات</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">معلومات التواصل </h4>
                            <p>العنوان: سوريا- ادلب </p>
                            <p> ahmadsabha963@gmail.com  :الايميل </p>
                            <p>رقم الهاتف: 00963 949 210 485  </p>
                            <p>طرق الدفع المقبولة</p>
                            {{-- <img src="{{ asset('img/payment.png') }}" class="img-fluid" alt=""> --}}
                            <img src="{{ asset('img/shamcash.jpg') }}" class="img-fluid" alt="" style="height: 50px; width: 100px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>حلول أكاديمية</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
  function toggleText() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more-text");
    var btnText = document.getElementById("readMoreBtn");

    if (dots.style.display === "none") {
      
      dots.style.display = "inline";
      btnText.innerHTML = "اقرأ المزيد";
      moreText.style.display = "none";
    } else {
      dots.style.display = "none";
      btnText.innerHTML = "اقرأ أقل";
      moreText.style.display = "inline";
    }
  }
</script>
    </body>

</html>