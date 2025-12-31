 @php
     $setting = \App\Models\WebsiteSetting::first();
 @endphp
<div class="topbar-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-xl-6 col-12">
                <div class="topbar-left">
                    <div class="topbar-contact">
                        <div class="contact-item">
                            <i class="fa-solid fa-phone"></i>
                            <a href="tel:+8801234567890">{{$setting->phone_one}}</a>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-envelope"></i>
                            <a href="mailto:info@example.com">{{$setting->email_one}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12 d-none d-lg-block">
                <div class="topbar-right">
                    <div class="topbar-school-info">
                        <ul class="topbar-school-info-list d-flex mb-0">
                            <li>
                                <a href="https://www.facebook.com/share/1AZaWinmjV/" target="_blank"><img
                                        src="images/facebook.svg" alt="#" /></a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/share/1AZaWinmjV/" target="_blank"><img
                                        src="images/linkedin.svg" alt="#" /></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><img src="images/whatsapp.svg" alt="#" /></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
