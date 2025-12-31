    @extends('frontend.layouts.frontend_master')
    @section('title', 'MR Solutions BD')
    @section('content')
        <!--==============Hero Slider Section Start===================-->
        <section class="hero-section">
            <div class="container">
                <div class="hero-slider owl-carousel owl-theme">
                    <div class="item" style="background-image: url('{{ asset('frontend/assets/images/banner-3.png') }}')">
                        <div class="hero-slider-content align-self-end"></div>
                    </div>

                    <div class="item" style="background-image: url('{{ asset('frontend/assets/images/banner-4.png') }}')">
                        <div class="hero-slider-content align-self-end"></div>
                    </div>

                    <div class="item" style="background-image: url('{{ asset('frontend/assets/images/banner-5.png') }}')">
                        <div class="hero-slider-content align-self-end"></div>
                    </div>
                </div>
            </div>
        </section>
        <!--==============Hero Slider Section End===================-->

        <!--==============About Section Start======================-->
        <section class="about-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12 about-content">
                        <h1 class="about-title" data-aos="fade-right">
                            MR SOLUTIONS-এ আপনাকে স্বাগতম
                        </h1>
                        <p class="about-text">
                            MR SOLUTIONS একটি প্রফেশনাল মাল্টিপল সার্ভিস কোম্পানি, যা আইটি
                            সার্ভিস, ওয়েব ডেভেলপমেন্ট, অ্যাপ ডেভেলপমেন্ট, প্রিন্টিং সার্ভিস,
                            কর্পোরেট গিফট আইটেম এবং ইভেন্ট অ্যাক্টিভেশন সার্ভিস প্রদান করে।
                            আমরা ব্যক্তি ও কর্পোরেট ক্লায়েন্টদের জন্য আধুনিক, কার্যকর এবং
                            নির্ভরযোগ্য সমাধান দিয়ে থাকি। আমাদের লক্ষ্য হলো ক্লায়েন্টের
                            ব্যবসাকে ডিজিটাল ও ক্রিয়েটিভভাবে এগিয়ে নেওয়া। দক্ষ টিম,
                            পরিকল্পিত কাজের ধারা এবং সময়নিষ্ঠ ডেলিভারি এবং একটি বিশ্বাসযোগ্য
                            সার্ভিস ব্র্যান্ড হিসেবে পরিচিতি অর্জন করা। আপনি যদি একটি
                            নির্ভরযোগ্য আইটি ও মাল্টিপল সার্ভিস পার্টনার খুঁজে থাকেন, MR
                            SOLUTIONS আপনার সঠিক পছন্দ।
                        </p>
                        <!-- <a href="#" class="btn download-button">Download Company Profile</a> -->
                    </div>
                    <div class="col-lg-5 col-md-12 mt-md-4 mt-lg-0">
                        <div class="video-container">
                            <div>
                                <img src="{{ asset('frontend/assets/images/about.jpeg') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================About Section End=====================-->

        <!--==============Service Section Start======================-->
        <section class="service">
            <div class="container">
                <div class="row">
                    <h4 class="section-title" data-aos="fade-up" data-aos-duration="800">
                        Services WE PROVIDE
                    </h4>
                    <div class="col-md-4 mb-4">
                        <div
                            class="service-card text-center bg-light d-flex flex-column align-items-center justify-content-center">
                            <div class="bg-shift"></div>
                            <img src="{{ asset('frontend/assets/images/coding.png') }}" alt="Web Developer" />
                            <div class="title">
                                ওয়েবসাইট ডেভেলপমেন্ট
                                <p>
                                    MR SOLUTIONS কাস্টম ওয়েবসাইট ডেভেলপমেন্ট সার্ভিস প্রদান করে যা
                                    SEO-ফ্রেন্ডলি, মোবাইল রেসপন্সিভ এবং দ্রুত লোডিং নিশ্চিত করে।
                                    সার্চ ইঞ্জিনে ভালো র‍্যাংক এবং অনলাইন ভিজিবিলিটি বাড়ানোর জন্য
                                    আমরা আধুনিক ওয়েব টেকনোলজি ও স্ট্রাকচার্ড ডিজাইন ব্যবহার করি।
                                </p>
                            </div>
                            <div class="content">
                                <h5>ওয়েবসাইট ডেভেলপমেন্ট</h5>
                                <p>
                                    MR SOLUTIONS কাস্টম ওয়েবসাইট ডেভেলপমেন্ট সার্ভিস প্রদান করে যা
                                    SEO-ফ্রেন্ডলি, মোবাইল রেসপন্সিভ এবং দ্রুত লোডিং নিশ্চিত করে।
                                    সার্চ ইঞ্জিনে ভালো র‍্যাংক এবং অনলাইন ভিজিবিলিটি বাড়ানোর জন্য
                                    আমরা আধুনিক ওয়েব টেকনোলজি ও স্ট্রাকচার্ড ডিজাইন ব্যবহার করি।
                                </p>
                                <button class="btn">More Deteils</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div
                            class="service-card text-center bg-light d-flex flex-column align-items-center justify-content-center">
                            <div class="bg-shift"></div>
                            <img src="{{ asset('frontend/assets/images/app-development.png') }}" alt="Web Developer" />
                            <div class="title">
                                সফটওয়্যার ডেভেলপমেন্ট
                                <p>
                                    MR SOLUTIONS প্রফেশনাল সফটওয়্যার ডেভেলপমেন্ট সার্ভিস প্রদান
                                    করে, যেখানে নির্ভরযোগ্য আর্কিটেকচার, সিকিউর কোডিং এবং স্কেলেবল
                                    সল্যুশনের ওপর গুরুত্ব দেওয়া হয়। আমরা ব্যবসার প্রয়োজন
                                    অনুযায়ী কাস্টম সফটওয়্যার তৈরি করি, যা অপারেশন সহজ করে এবং
                                    দীর্ঘমেয়াদে কার্যকারিতা বাড়ায়।
                                </p>
                            </div>
                            <div class="content">
                                <h5>সফটওয়্যার ডেভেলপমেন্ট</h5>
                                <p>
                                    MR SOLUTIONS প্রফেশনাল সফটওয়্যার ডেভেলপমেন্ট সার্ভিস প্রদান
                                    করে, যেখানে নির্ভরযোগ্য আর্কিটেকচার, সিকিউর কোডিং এবং স্কেলেবল
                                    সল্যুশনের ওপর গুরুত্ব দেওয়া হয়। আমরা ব্যবসার প্রয়োজন
                                    অনুযায়ী কাস্টম সফটওয়্যার তৈরি করি, যা অপারেশন সহজ করে এবং
                                    দীর্ঘমেয়াদে কার্যকারিতা বাড়ায়।
                                </p>
                                <button class="btn">More Deteils</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div
                            class="service-card text-center bg-light d-flex flex-column align-items-center justify-content-center">
                            <div class="bg-shift"></div>
                            <img src="{{ asset('frontend/assets/images/research-and-development.png') }}"
                                alt="Web Developer" />
                            <div class="title">
                                আইটি সাপোর্ট
                                <p>
                                    MR SOLUTIONS আইটি সাপোর্ট সার্ভিস প্রদান করে যার মধ্যে রয়েছে
                                    হার্ডওয়্যার ও সফটওয়্যার সাপোর্ট, নেটওয়ার্ক মেইনটেন্যান্স,
                                    সিস্টেম ট্রাবলশুটিং এবং রিমোট টেকনিক্যাল সাপোর্ট। নির্ভরযোগ্য
                                    আইটি সার্ভিসের মাধ্যমে আমরা ব্যবসার ডাউনটাইম কমাতে সাহায্য
                                    করি।
                                </p>
                            </div>
                            <div class="content">
                                <h5>আইটি সাপোর্ট</h5>
                                <p>
                                    MR SOLUTIONS আইটি সাপোর্ট সার্ভিস প্রদান করে যার মধ্যে রয়েছে
                                    হার্ডওয়্যার ও সফটওয়্যার সাপোর্ট, নেটওয়ার্ক মেইনটেন্যান্স,
                                    সিস্টেম ট্রাবলশুটিং এবং রিমোট টেকনিক্যাল সাপোর্ট। নির্ভরযোগ্য
                                    আইটি সার্ভিসের মাধ্যমে আমরা ব্যবসার ডাউনটাইম কমাতে সাহায্য
                                    করি।
                                </p>
                                <button class="btn">More Deteils</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div
                            class="service-card text-center bg-light d-flex flex-column align-items-center justify-content-center">
                            <div class="bg-shift"></div>
                            <img src="{{ asset('frontend/assets/images/laser.png') }}" alt="Web Developer" />

                            <div class="title">
                                প্রিন্টিং সার্ভিসেস
                                <p>
                                    MR SOLUTIONS উচ্চমানের প্রিন্টিং সার্ভিস প্রদান করে, যার মধ্যে
                                    রয়েছে বিজনেস কার্ড, ব্রোশিওর, পোস্টার, ফ্লায়ার এবং কাস্টম
                                    প্রিন্ট প্রোডাকশন। আমরা প্রফেশনাল প্রিন্ট কোয়ালিটি, সময়মতো
                                    ডেলিভারি এবং কাস্টম ডিজাইন সাপোর্ট নিশ্চিত করি।
                                </p>
                            </div>
                            <div class="content">
                                <h5>প্রিন্টিং সার্ভিসেস</h5>
                                <p>
                                    MR SOLUTIONS উচ্চমানের প্রিন্টিং সার্ভিস প্রদান করে, যার মধ্যে
                                    রয়েছে বিজনেস কার্ড, ব্রোশিওর, পোস্টার, ফ্লায়ার এবং কাস্টম
                                    প্রিন্ট প্রোডাকশন। আমরা প্রফেশনাল প্রিন্ট কোয়ালিটি, সময়মতো
                                    ডেলিভারি এবং কাস্টম ডিজাইন সাপোর্ট নিশ্চিত করি।
                                </p>
                                <button class="btn">More Deteils</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div
                            class="service-card text-center bg-light d-flex flex-column align-items-center justify-content-center">
                            <div class="bg-shift"></div>
                            <img src="{{ asset('frontend/assets/images/stadium.png') }}" alt="Web Developer" />

                            <div class="title">
                                ইভেন্ট অ্যাক্টিভেশন
                                <p>
                                    MR SOLUTIONS কাস্টম ইভেন্ট এবং ব্র্যান্ড অ্যাক্টিভেশন সার্ভিস
                                    প্রদান করে। আমাদের সার্ভিসের মধ্যে রয়েছে কর্পোরেট ইভেন্ট,
                                    প্রোডাক্ট লঞ্চ, ওয়ার্কশপ এবং পাবলিক ক্যাম্পেইন। আমরা সৃজনশীল
                                    পরিকল্পনা, কার্যকর এক্সিকিউশন এবং ব্র্যান্ড এনগেজমেন্ট নিশ্চিত
                                    করি।
                                </p>
                            </div>
                            <div class="content">
                                <h5>ইভেন্ট অ্যাক্টিভেশন</h5>
                                <p>
                                    MR SOLUTIONS কাস্টম ইভেন্ট এবং ব্র্যান্ড অ্যাক্টিভেশন সার্ভিস
                                    প্রদান করে। আমাদের সার্ভিসের মধ্যে রয়েছে কর্পোরেট ইভেন্ট,
                                    প্রোডাক্ট লঞ্চ, ওয়ার্কশপ এবং পাবলিক ক্যাম্পেইন। আমরা সৃজনশীল
                                    পরিকল্পনা, কার্যকর এক্সিকিউশন এবং ব্র্যান্ড এনগেজমেন্ট নিশ্চিত
                                    করি।
                                </p>
                                <button class="btn">More Deteils</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div
                            class="service-card text-center bg-light d-flex flex-column align-items-center justify-content-center">
                            <div class="bg-shift"></div>
                            <img src="{{ asset('frontend/assets/images/gift-box.png') }}" alt="Web Developer" />

                            <div class="title">
                                গিফট আইটেম
                                <p>
                                    MR SOLUTIONS প্রিমিয়াম গিফট আইটেম সার্ভিস প্রদান করে, যেখানে
                                    উচ্চমানের কাস্টমাইজড গিফট এবং কর্পোরেট প্রেজেন্টেশন সমাধান করা
                                    হয়। আমরা ব্যক্তিগত এবং বিজনেস উভয় প্রয়োজন অনুযায়ী বিশেষ
                                    উপহার তৈরি করি, যা ব্র্যান্ড ইমেজ এবং সম্পর্ককে শক্তিশালী করে।
                                </p>
                            </div>
                            <div class="content">
                                <h5>গিফট আইটেম</h5>
                                <p>
                                    MR SOLUTIONS প্রিমিয়াম গিফট আইটেম সার্ভিস প্রদান করে, যেখানে
                                    উচ্চমানের কাস্টমাইজড গিফট এবং কর্পোরেট প্রেজেন্টেশন সমাধান করা
                                    হয়। আমরা ব্যক্তিগত এবং বিজনেস উভয় প্রয়োজন অনুযায়ী বিশেষ
                                    উপহার তৈরি করি, যা ব্র্যান্ড ইমেজ এবং সম্পর্ককে শক্তিশালী করে।
                                </p>
                                <button class="btn">More Deteils</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==============Service Section Start======================-->

        <!--==============Team Section Start======================-->
        <section class="team">
            <div class="text-center">
                <h4 class="section-title team-title" data-aos="fade-up" data-aos-duration="800">
                    Meet Our Team
                </h4>
            </div>
            <div class="container">
                <div class="row g-4 justify-content-center">
                    <!-- Team Member Start -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card team-owner-card shadow-sm px-1 pt-5 pb-4">
                            <div class="image-ring">
                                <img src="  {{ asset('frontend/assets/images/Expert Web Designe & Responsive Website  WordPress.jpg') }}"
                                    alt="Md Zikrul Ahsan (Shawon)" />
                            </div>
                            <div class="card-body">
                                <div class="team-owner-name">Razib Hossain</div>
                                <div class="team-owner-role">Co-Founder</div>
                                <div class="team-owner-info">
                                    <strong>E-mail:</strong>
                                    <a href="">razib.web63@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Team Member End -->
                    <!-- Copy the above block for each member -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card team-owner-card shadow-sm px-1 pt-5 pb-4">
                            <img src="{{ asset('frontend/assets/images/mamun.jpg') }}" alt="Nurul Afsar Polash" />
                            <div class="card-body">
                                <div class="team-owner-name">Engr. Md. Almamun</div>
                                <div class="team-owner-role">Co-Founder</div>
                                <div class="team-owner-info">
                                    <strong>E-mail:</strong>
                                    <a href="">asiamamun2011@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add more team members as needed -->
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card team-card shadow-sm px-1 pt-5 pb-4">
                            <img src="{{ asset('frontend/assets/images/sahin-vai.jpg') }}" alt="Muhammad Shrabon" />
                            <div class="card-body">
                                <div class="team-owner-name">Shahin Akon</div>
                                <div class="team-owner-role">Accounts Manager</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card team-card shadow-sm px-1 pt-5 pb-4">
                            <img src="{{ asset('frontend/assets/images/shrabon.jpg') }}" alt="Muhammad Shrabon" />
                            <div class="card-body">
                                <div class="team-owner-name">Muhammad Shrabon</div>
                                <div class="team-owner-role">Software Engineer</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card team-card shadow-sm px-1 pt-5 pb-4">
                            <img src="{{ asset('frontend/assets/images/arifulislam.jpg') }}" alt="Ariful Islam" />
                            <div class="card-body">
                                <div class="team-owner-name">Ariful Islam</div>
                                <div class="team-owner-role">Front-End-Developer</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card team-card shadow-sm px-1 pt-5 pb-4">
                            <img src="{{ asset('frontend/assets/images/alamin-paython.png') }}"
                                alt="Md Zikrul Ahsan (Shawon)" />
                            <div class="card-body">
                                <div class="team-owner-name">Md Al Amin</div>
                                <div class="team-owner-role">Software Engineer</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card team-card shadow-sm px-1 pt-5 pb-4">
                            <img src="{{ asset('frontend/assets/images/alamin.jpg') }}" alt="Al-amin Hossain" />
                            <div class="card-body">
                                <div class="team-owner-name">Al-amin Hossain</div>
                                <div class="team-owner-role">Senior Front-End-Developer</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card team-card shadow-sm px-1 pt-5 pb-4">
                            <img src="{{ asset('frontend/assets/images/Expert Web Designe & Responsive Website  WordPress.jpg') }}"
                                alt="Md Zikrul Ahsan (Shawon)" />
                            <div class="card-body">
                                <div class="team-owner-name">Razib Hossain</div>
                                <div class="team-owner-role">Front-End-Developer</div>
                                <!-- <div class="team-owner-info">
                      <strong>E-mail:</strong>
                      <a href="">razib.web63@gmail.com</a>
                    </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card team-card shadow-sm px-1 pt-5 pb-4">
                            <img src="{{ asset('frontend/assets/images/Expert Web Designe & Responsive Website  WordPress.jpg') }}"
                                alt="Md Zikrul Ahsan (Shawon)" />
                            <div class="card-body">
                                <div class="team-owner-name">AL-Amin Hossain</div>
                                <div class="team-owner-role">Front-End-Developer</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==============Team Section End======================-->

        <!--==============Projects Section Start======================-->
        <section class="projects">
            <div class="container text-center">
                <h4 class="section-title">Working projects</h4>
                <div class="row">
                    <!-- Project Card -->
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div class="project-card">
                            <img src="images/globex.png" class="img-fluid project-img" alt="Project" />
                        </div>
                        <a target="_blank" href="https://globexltd.net/">
                            <button class="project-name-button">GlobEx Ltd.</button>
                        </a>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div class="project-card">
                            <img src="images/sksolutions.png" class="img-fluid project-img" alt="Project" />
                        </div>
                        <a target="_blank" href="https://www.sksolutionsbd.com/">
                            <button class="project-name-button">Sk Solutions BD</button>
                        </a>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div class="project-card">
                            <img src="images/mamuntech.png" class="img-fluid project-img" alt="Project" />
                        </div>

                        <a target="_blank" href=" https://mamunstech.com/">
                            <button class="project-name-button">Mamunstech</button>
                        </a>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div class="project-card">
                            <img src="images/embssy.png" class="img-fluid project-img" alt="Project" />
                        </div>
                        <a target="_blank" href="https://embassydrycleanerbd.com/">
                            <button class="project-name-button">Embassy Dry Cleaner</button>
                        </a>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div class="project-card">
                            <img src="images/bmrc ss.png" class="img-fluid project-img" alt="Project" />
                        </div>
                        <a target="_blank" href="https://www.bmrcbd.org/">
                            <button class="project-name-button">BMRC-IT Support(Lab)</button>
                        </a>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div class="project-card">
                            <img src="images/dgme-final.png" class="img-fluid project-img" alt="Project" />
                        </div>
                        <button class="project-name-button">Printing Item</button>
                    </div>
                </div>

                <a href="project.html">
                    <button class="read-more-btn mt-4">Read More</button></a>
            </div>
        </section>
        <!--==============Projects Section End======================-->

        <!--==============Clients Section Start======================-->
        <section class="clients" data-aos="fade-up" data-aos-duration="1500">
            <div class="container">
                <h4 class="section-title">Our Clients List</h4>
                <div class="row">
                    <!-- Single logo -->
                    <div class="col-6 col-md-4 col-lg-2 mb-4">
                        <div class="client-logo">
                            <img src="images/final-logo.jpg" class="img-fluid" alt="Client Logo" />
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 mb-4">
                        <div class="client-logo">
                            <img src="images/sk.jpg" class="img-fluid" alt="Client Logo" />
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-2 mb-4">
                        <div class="client-logo">
                            <img src="images/Embassy.jpg" class="img-fluid" alt="Client Logo" />
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-2 mb-4">
                        <div class="client-logo">
                            <img src="images/bmrc.png" class="img-fluid" alt="Client Logo" />
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-2 mb-4">
                        <div class="client-logo">
                            <img src="images/dgme.png" class="img-fluid" alt="Client Logo" />
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 mb-4">
                        <div class="client-logo">
                            <img src="images/final-logo.jpg" class="img-fluid" alt="Client Logo" />
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 mb-4">
                        <div class="client-logo">
                            <img src="images/Embassy.jpg" class="img-fluid" alt="Client Logo" />
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-2 mb-4">
                        <div class="client-logo">
                            <img src="images/sk.jpg" class="img-fluid" alt="Client Logo" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==============Clients Section End======================-->
    @endsection
