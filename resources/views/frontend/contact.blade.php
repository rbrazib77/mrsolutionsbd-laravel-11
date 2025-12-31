@extends('frontend.layouts.frontend_master')
@section('content')
    @include('frontend.partial.breadcrumb')
    <!-- Google Map -->
    <section class="contact-googlemap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <iframe src="{{ $setting->map_url }}" width="100%" height="400" style="border: 0" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Details and Form -->
    <section class="contact">
        <div class="container">
            <div class="row">
                <!-- Contact Info -->
                <div class="col-md-4 mb-4 order-1 order-md-1 contact-info">
                    <h5><strong>Office Address</strong></h5>
                    <div class="contact-box">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="info-content">
                                <strong>Address:</strong>
                                <span>{{ $setting->address }}</span>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="info-content">
                                <strong>Phone:</strong>
                                <a href="">
                                    <span>{{ $setting->phone }}</span>
                                </a>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon"><i class="fa-solid fa-envelope"></i></div>
                            <div class="info-content">
                                <strong>Email:</strong>
                                <a href="mailto:eventtimeltd@gmail.com">{{ $setting->email }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-md-8 contact-info order-2 order-md-3">
                    @php
                        $num1 = rand(1, 10);
                        $num2 = rand(1, 10);
                    @endphp
                    <h5><strong>GET IN TOUCH WITH US</strong></h5>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                            {{ session('success') }}
                        </div>
                        <script>
                            setTimeout(function() {
                                const alert = document.getElementById('success-alert');
                                if (alert) {
                                    alert.classList.remove('show');
                                    alert.classList.add('fade');
                                    setTimeout(() => alert.remove(), 500);
                                }
                            }, 4000);
                        </script>
                    @endif
                    <form action="{{ route('contact.message.submit') }}" class="contact-form" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Name *" required />
                                @error('name')
                                    <span class="text-danger fw-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="E-mail *" required />
                                @error('email')
                                    <span class="text-danger fw-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" class="form-control" placeholder="Phone Number" />
                                @error('phone')
                                    <span class="text-danger fw-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="subject" class="form-control" placeholder="Subject *"
                                    required />
                                @error('subject')
                                    <span class="text-danger fw-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                                @error('message')
                                    <span class="text-danger fw-bold">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Captcha Section --}}
                            <div class="col-md-12 mb-3">
                                <label class="form-label form--label">Security Check: <strong>{{ $num1 }} +
                                        {{ $num2 }} = ?</strong> <span class="text-danger">*</span></label>
                                <input type="number" name="captcha" placeholder="Enter the sum"
                                    class="form-control shadow-none">

                                {{-- Store numbers in hidden fields for validation --}}
                                <input type="hidden" name="num1" value="{{ $num1 }}">
                                <input type="hidden" name="num2" value="{{ $num2 }}">

                                @error('captcha')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn_ btn_contact px-4">SEND MESSAGE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section @endsection
