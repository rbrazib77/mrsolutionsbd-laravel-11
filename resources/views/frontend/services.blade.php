@extends('frontend.layouts.frontend_master')
@section('content')
    @include('frontend.partial.breadcrumb')
    <!-- ==================Services Section Start============================ -->
    <section class="services">
        <div class="container">
            <div class="our-services">
                <h2>OUR SERVICES</h2>
            </div>
            <div class="row g-4">
                @foreach ($ourServices as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card service-card h-100">
                            <img src="{{ asset('upload/services/' . $item->image) }}" class="card-img-top"
                                alt="Event in Dhaka" />
                            <div class="card-body">
                                <h5>{{ $item->title }}</h5>
                                <p>
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ==================Services Section End============================ -->
    <!-- ==================Activities Section Start============================ -->
    <section class="activities">
        <div class="container text-center">
            <h2>OUR ACTIVITIES</h2>
            <h4>For Customers</h4>
            <div class="row text-start">
                @foreach ($activitys as $i => $item)
                     <div class="col-md-4 mb-5">
                    <div class="activity-box">
                        <div class="activity-number">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}.</div>
                        <div class="activity-title">{{$item->title}}</div>
                        <p class="activity-description">
                           {{$item->description}}
                        </p>
                    </div>
                </div>
                @endforeach
               
{{-- 
                <div class="col-md-4 mb-5">
                    <div class="activity-box">
                        <div class="activity-number">02.</div>
                        <div class="activity-title">Creative Venue Decorations</div>
                        <p class="activity-description">
                            <strong>Creative decoration</strong> transforms spaces with
                            unique themes, colors, and designs, adding personality and
                            flair. It enhances the atmosphere, making any event visually
                            engaging and memorable.
                        </p>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="activity-box">
                        <div class="activity-number">03.</div>
                        <div class="activity-title">Arranging Proper Logistics</div>
                        <p class="activity-description">
                            <strong>Proper logistics</strong> ensures smooth event
                            operations, from transportation to equipment setup. Efficient
                            planning and coordination guarantee timely execution, minimizing
                            disruptions and enhancing the overall event experience.
                        </p>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="activity-box">
                        <div class="activity-number">04.</div>
                        <div class="activity-title">Budget Friendly</div>
                        <p class="activity-description">
                            <strong>Budget-friendly</strong> solutions provide quality
                            services or products at affordable prices. They help individuals
                            or businesses achieve their goals without compromising on value,
                            ensuring cost-effective satisfaction.
                        </p>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="activity-box">
                        <div class="activity-number">05.</div>
                        <div class="activity-title">Create a Attractive Ambience</div>
                        <p class="activity-description">
                            The restaurant’s attractive ambience, with soft lighting and
                            elegant décor, creates a warm, inviting atmosphere perfect for
                            intimate dinners or casual gatherings.
                        </p>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="activity-box">
                        <div class="activity-number">06.</div>
                        <div class="activity-title">Providing Best Transport</div>
                        <p class="activity-description">
                            Proper transport ensures timely, safe, and efficient movement of
                            goods and people, enhancing connectivity, reducing delays, and
                            supporting economic growth and community development.
                        </p>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- ==================Activities Section End============================ -->
@endsection
