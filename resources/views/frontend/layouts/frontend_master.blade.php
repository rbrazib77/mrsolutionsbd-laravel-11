<!DOCTYPE html>
<html lang="en">
@php
    $seo = getSeo($pageName ?? 'home'); // controller থেকে $pageName পাঠাও
@endphp
@php
    $setting = \App\Models\WebsiteSetting::first();
@endphp

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ $seo->meta_description ?? '' }}">
    <meta name="keywords" content="{{ $seo->meta_keywords ?? '' }}">
    @if ($seo && $seo->og_image)
        <meta property="og:image" content="{{ asset($seo->og_image) }}">
    @endif
    <title> {{ $seo->meta_title ?? config('app.name') }}</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/images/favicon.png') }}" />
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" />
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}" />
    <!-- Uicons -->
    <link rel="stylesheet" href="css/uicons.css" />
    <!-- Icofont -->
    <link rel="stylesheet" href="css/icofont.css" />
    <!-- Maginific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/maginific-popup.min.css') }}" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- FancyBox CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery.fancybox.min.css') }}" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/media.css') }}" />
</head>

<body>
    <!--============Mobile Menu Modal================ -->
    @include('frontend.partial.mobileMenu')
    <!--============End Mobile Menu Modal================ -->

    <!-- ===============Topbar Section Start================= -->
    @include('frontend.partial.topbar')
    <!-- ===============Topbar Section End================= -->

    <!--==============Navbar Section Start===================-->
    @include('frontend.partial.header')
    <!--==============Navbar Section End===================-->

    @yield('content')
    <!--==============Footer Section Start======================-->
    @include('frontend.partial.footer')
    <!--==============Footer Section End======================-->
    <!-- Free Consultation Button -->
    <div id="consult-btn">FREE CONSULTATION</div>

    <!-- Consultation Form -->
    <div id="consult-form">
        <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>
        <h4 class="mb-3">ফ্রি প্রজেক্ট কনসালটেশন</h4>
        <form>
            <div class="mb-3">
                <input type="text" class="form-control custom-bottom" placeholder="আপনার পুরো নাম লিখুন" />
            </div>
            <div class="mb-3">
                <input type="text" class="form-control custom-bottom" placeholder="মোবাইল নাম্বার লিখুন" />
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <input type="email" class="form-control custom-input" placeholder="ইমেইল ঠিকানা লিখুন" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <select class="form-control custom-bottom custom-select">
                            <option value="">সার্ভিস নির্বাচন করুন</option>
                            <option value="">ওয়েবসাইট ডেভেলপমেন্ট</option>
                            <option value="">সফটওয়্যার ডেভেলপমেন্ট</option>
                            <option value="">আইটি সাপোর্ট</option>
                            <option value="">প্রিন্টিং সার্ভিসেস</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <textarea class="form-control custom-bottom" rows="4" placeholder="বিস্তারিত লিখুন"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">
                বার্তা পাঠান
            </button>
            <!-- <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div> -->
        </form>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </div>

    <div id="autoPopup" class="popup" style="display: none">
        <div class="popup-content">
            <span class="close-btn" id="closePopup">✖</span>

            <div class="popup-header">
                <h2 class="header-title">MR SOLUTIONS</h2>
            </div>

            <div class="popup-body">
                <p class="body-intro">ফ্রি কনসালটেশন নিন</p>
                <form>
                    <input type="text" class="form-input" placeholder="আপনার পুরো নাম লিখুন" aria-label="Name" />
                    <input type="tel" class="form-input" placeholder="মোবাইল নাম্বার লিখুন"
                        aria-label="Phone" />

                    <button type="submit" class="cta-button cta-red">
                        REQUEST A CALL
                    </button>

                    <p class="separator-text">OR</p>

                    <button type="button" class="cta-button cta-green">
                        CALL US NOW
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const popupDelay = 300000;

        setTimeout(() => {
            document.getElementById("autoPopup").style.display = "flex";
        }, popupDelay);

        document.getElementById("closePopup").onclick = function() {
            document.getElementById("autoPopup").style.display = "none";
        };
    </script>

    <script>
        const consultBtn = document.getElementById("consult-btn");
        const consultForm = document.getElementById("consult-form");
        const closeBtn = document.querySelector("#consult-form .close-btn");

        consultBtn.addEventListener("click", () => {
            consultForm.classList.add("active");
        });

        closeBtn.addEventListener("click", () => {
            consultForm.classList.remove("active");
        });
    </script>

    <!-- Back to Top Button -->
    <button id="backToTop" class="shadow">
        <i class="fa-solid fa-angle-up"></i>
    </button>

    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- CounterUp  JS -->
    <script src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/waypoints.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/mixitup@3/dist/mixitup.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('frontend/assets/js/magnific-popup.min.js') }}"></script>
    <!-- Wow JS -->
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
</body>

</html>
