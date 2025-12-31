@extends('frontend.layouts.frontend_master')
@section('content')
    @include('frontend.partial.breadcrumb')
    <section class="about">
        <div class="container">
            <div class="about-item">
                <div class="row align-items-center g-5">
                    <!-- Left images -->
                    <div class="col-md-6">
                        <div class="d-flex flex-column gap-3">
                            <div class="image-grid">
                                <img src="{{ asset('upload/abouts/' . $about->top_image) }}" alt="Top Image"
                                    class="rounded-custom shadow-custom" />
                            </div>
                            <div class="row g-3">
                                <div class="col-6">
                                    <img src="{{ asset('upload/abouts/' . $about->bottom_left_image) }}" alt="Bottom Left"
                                        class="rounded-custom shadow-custom img-fluid" />
                                </div>
                                <div class="col-6">
                                    <img src="{{ asset('upload/abouts/' . $about->bottom_right_image) }}" alt="Bottom Right"
                                        class="rounded-custom shadow-custom img-fluid" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right text -->
                    <div class="col-md-6">
                        <div class="about-content">
                            <p class="mb-2">{{ $about->small_title }}</p>
                            @php
                                $title = str_replace('SK Solutions', '<span>SK Solutions</span>', $about->title);
                            @endphp
                            <h2 class="mb-4">{!! $title !!}</h2>
                            <p class="">
                                {{ $about->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===========Why Choose Us Section Start======================== -->
    <section class="Why_Choose">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">{{ $whyChooseUsHeading->section_title }}</h2>
                <p class="subheading">
                    {{ $whyChooseUsHeading->section_subtitle }}
                </p>
            </div>

            <div class="row">
                @foreach ($whyChooseUsFeature as $i => $feature)
                    <div class="col-md-4">
                        <div class="feature-box">
                            <div class="feature-number">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}.</div>
                            <div class="feature-title">{{ $feature->title }}</div>
                            <div class="feature-description">{{ $feature->description }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ===========Why Choose Us Section End======================== -->
    <!-- ===========Mission Vision Section Start======================== -->
    <section class="missionVision">
        <div class="container">
            <div class="row gx-5">
                <!-- Left: Mission -->
                <div class="col-lg-6">
                    @if ($mission && $mission->status)
                        <p class="">{{ $mission->small_title }}</p>
                        @php
                            $title = str_replace('Mission', '<span>Mission</span>', $mission->title);
                        @endphp
                        <h2 class="mb-2">{!! $title !!}</h2>
                        <p>
                            {{ $mission->description }}
                        </p>
                        <div class="row g-3 mt-4">
                            <div class="col-6 image-box">
                                <img src="{{ asset('upload/missions/' . $mission->top_left_image) }}"
                                    class="img-fit rounded-start-top" alt="Image 1" />
                            </div>
                            <div class="col-6 image-box">
                                <img src="{{ asset('upload/missions/' . $mission->top_right_image) }}" class="img-fit"
                                    alt="Image 2" />
                            </div>
                            <div class="col-12 image-box">
                                <img src="{{ asset('upload/missions/' . $mission->bottom_image) }}"
                                    class="img-fit rounded-start-bottom" alt="Image 3" />
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Right: Vision -->
                <div class="col-lg-6">
                    @if ($vision && $vision->status)
                        <div class="row g-3 mb-4">
                            <div class="col-12 image-box">
                                <img src="{{ asset('upload/visions/' . $vision->top_image) }}"
                                    class="img-fit rounded-end-top" alt="Image 4" />
                            </div>
                            <div class="col-6 image-box">
                                <img src="{{ asset('upload/visions/' . $vision->bottom_left_image) }}" class="img-fit"
                                    alt="Image 5" />
                            </div>
                            <div class="col-6 image-box">
                                <img src="{{ asset('upload/visions/' . $vision->bottom_right_image) }}"
                                    class="img-fit rounded-end-bottom" alt="Image 6" />
                            </div>
                        </div>
                        <p class="">{{ $vision->small_title }}</p>
                        @php
                            $title = str_replace('Vision', '<span>Vision</span>', $vision->title);
                        @endphp
                        <h2 class="mb-2">{!! $title !!}</h2>
                        <p>
                            {{ $vision->description }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- ===========Mission Vision Section End======================== -->
    <!-- ===========Clients Section Start======================== -->
    <section class="client">
        <div class="container">
            <h2 class="client-title">Our Clients</h2>
            <div class="row gx-3 client-grid clients_slider">
                @foreach ($clients as $client)
                    <div class="col" style="--i: {{ $loop->iteration }}">
                        <div class="client-logo text-center">
                            <img src="{{ asset('upload/clients/' . $client->logo) }}" alt="{{ $client->name }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ===========Clients Section End======================== -->
@endsection
