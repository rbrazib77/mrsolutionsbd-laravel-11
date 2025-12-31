   @php
       $setting = \App\Models\WebsiteSetting::first();
       //    $socialMediaLink = \App\Models\SocialMediaLink::where('status', 1)->get();
   @endphp
   {{-- @php
       $setting = \App\Models\WebsiteSetting::first();
       $socialMediaLink = \App\Models\SocialMediaLink::where('status', 1)->get();
   @endphp

   <footer class="footer" style="background-image: url('{{ asset('frontend/assets/images/mask.png') }}')">
       <div class="container">
           <div class="row text-white">
               <!-- SK SOLUTIONS -->
               <div class="col-md-5 col-lg-4 order-1 order-md-1">
                   <a href="">
                       <div class="footer-logo">
                           <img src="{{ asset('upload/settings/' . $setting->logo) }}" alt="" />
                       </div>
                   </a>
                   <p>
                       {{ $setting->footer_description }}
                   </p>

                   <div class="d-flex gap-3 pt-3">
                       @foreach ($socialMediaLink as $link)
                           <a target="_blank" href="{{ $link->url }}" class="social-icon"><i
                                   class="fa-brands {{ $link->icon_class }}"></i></a>
                       @endforeach
                   </div>
               </div>

               <!-- Contact Info -->
               <div class="col-md-4 col-lg-3 mt-4 mt-md-0 order-2 order-md-3 footer-contact">
                   <h5>Contact</h5>
                   <div class="contact-box">
                       <div class="info-item">
                           <div class="info-icon">
                               <i class="fa-solid fa-location-dot"></i>
                           </div>
                           <div class="info-content">
                               <strong>Address:</strong>
                               <span>
                                   {{ $setting->address }}</span>
                           </div>
                       </div>
                       <div class="info-item">
                           <div class="info-icon">
                               <i class="fa-solid fa-phone"></i>
                           </div>
                           <div class="info-content">
                               <strong>Phone:</strong>
                               <a href=""><span>{{ $setting->phone }}</span></a>
                           </div>
                       </div>
                       <div class="info-item">
                           <div class="info-icon">
                               <i class="fa-solid fa-envelope"></i>
                           </div>
                           <div class="info-content">
                               <strong>Email:</strong>
                               <a href="mailto:eventtimeltd@gmail.com">{{ $setting->email }}</a>
                           </div>
                       </div>
                   </div>
               </div>

               <!-- Google Map -->
               <div class="col-md-4 mt-4 mt-lg-0 col-lg-3 order-4 order-md-4">
                   <h5>Google Map</h5>
                   <iframe src="{{ $setting->map_url }}" width="100%" height="250" style="border: 0"
                       allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>

               <!-- Quick Links -->
               <div class="col-md-3 col-lg-2 mt-4 mt-md-0 order-3 order-md-2">
                   <h5>Quick Link</h5>
                   <ul>
                       <li><a href="{{ route('about') }}">About Us</a></li>
                       <li><a href="{{ route('services') }}">Services</a></li>
                       <li><a href="{{ route('gallery') }}">Gallery</a></li>
                       <li><a href="{{ route('contact') }}">Contact Us</a></li>
                       <li><a href="{{ route('privacy.policy') }}">Privacy & Policy</a></li>
                       <li><a href="{{ route('faq') }}">FAQ</a></li>
                   </ul>
               </div>
           </div>

           <hr />

           <!-- Footer Bottom -->
           <div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap">
               <span>{{ $setting->copy_right }}</span>
               <span>Developed by <a target="_blank" href="https://github.com/rbrazib77"> <span
                           class="custom-underline">Razib Hossian</span></a></span>
           </div>
       </div>
   </footer> --}}
   <footer class="footer-area">
       <div class="footer-top">
           <div class="container">
               <div class="row">
                   <div class="col-lg-4 col-md-6 col-12">
                       <div class="footer-widget footer-logo-text">
                           <img src="{{ asset($setting->footer_logo) }}" alt="Fopoter Logo" />
                           <p>
                               {{ $setting->footer_description }}
                           </p>
                       </div>
                   </div>
                   <div class="col-lg-4 col-md-6 col-12">
                       <div class="footer-widget quick-links">
                           <h4 class="footer-widget-title">গুরুত্বপূর্ণ লিঙ্ক</h4>
                           <ul class="quick-links-inner">
                               <li>
                                   <a href="contact.html">যোগাযোগ</a>
                               </li>
                               <li>
                                   <a href="about.html">গ্যালারি</a>
                               </li>
                               <li>
                                   <a href="blog.html">ব্লগস</a>
                               </li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-lg-4 col-12">
                       <div class="footer-widget contact">
                           <h4 class="footer-widget-title">যোগাযোগ</h4>
                           <!-- Single Widget -->
                           <div class="footer-contact-widget">
                               <div class="footer-contact-icon">
                                   <img src="{{ asset($setting->address_icon) }}" alt="Address Icon" />
                               </div>
                               <div class="footer-contact-info">
                                   <p class="footer-contact-text">
                                    {{ $setting->address }}
                                   </p>
                               </div>
                           </div>
                           <!-- Single Widget -->
                           <div class="footer-contact-widget">
                               <div class="footer-contact-icon">
                                   <img src="{{ asset($setting->phone_icon) }}" alt="Phone Icon" />
                               </div>
                               <div class="footer-contact-info">
                                   <a href="tel:+880 1734268063">{{ $setting->phone_one }}</a>
                                   <a href="tel:+880 1977083357">{{ $setting->phone_two }}</a>
                               </div>
                           </div>
                           <!-- Single Widget -->
                           <div class="footer-contact-widget">
                               <div class="footer-contact-icon">
                                   <img src="{{ asset($setting->email_icon) }}" alt="Email Icon" />
                               </div>
                               <div class="footer-contact-info">
                                   <a href="mailto:mrsolutionsbd77@gmail.com">{{ $setting->email_one }}</a>
                                   <!-- <a href="mailto:hello@xyzschool.com">mrsolutionsbd77@gmail.com</a> -->
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="footer-bottom">
           <div class="container">
               <div class="row align-items-center">
                   <div class="col-lg-6 col-12">
                       <div class="footer-copyright">
                           <p class="footer-copyright-text">
                               {{ $setting->copy_right }}
                           </p>
                       </div>
                   </div>
                   <div class="col-lg-6 col-12">
                       <span class="footer-social">Developed by:<a href="https://github.com/rbrazib77"
                               target="_blank">Razib Hossain</a></span>
                   </div>
               </div>
           </div>
       </div>
   </footer>
