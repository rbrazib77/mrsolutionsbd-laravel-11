@extends('admin.layouts.bashboard_master')
@section('title', 'Admin Dashboard')
@php
    $totalVisits = App\Models\UserActivityLog::sum('visit_count');
    $totalUser = App\Models\User::all()->count();
    $message = App\Models\ContactMessage::all()->count();
    $page = App\Models\SeoSetting::all()->count();
    $socialMedia = App\Models\SocialMedia::where('status', 1)->count();
    $banner = App\Models\BannerSection::where('status', 1)->count();
    $service = App\Models\OurServiceSection::where('status', 1)->count();
    $clients = App\Models\Client::where('status', 1)->count();

@endphp
@section('admin')
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
                    {{-- {{ $totalVisits }} --}}
                </div>
            </div>

            <!-- start row -->
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="row g-3">


                        <div class="col-md-6 col-xl-3">
                            <a href="{{ route('admin.user.list') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center text-uppercase">
                                            <div class="fs-18 mb-1 fw-bold">User List</div>
                                            <div class="fw-bold">{{ $totalUser }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-6 col-xl-3">
                            <a href="{{ route('admin.user-activity.index') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center text-uppercase">
                                            <div class="fs-18 mb-1 fw-bold">Visitor List</div>
                                            <div class="fw-bold">{{ $totalVisits }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <a href="{{ route('contact.message.index') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center text-uppercase">
                                            <div class="fs-18 mb-1 fw-bold">Client Message</div>
                                            <div class="fw-bold">{{ $message }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center text-uppercase">
                                        <div class="fs-18 mb-1 fw-bold">Total Page</div>
                                        <div class="fw-bold">{{ $page }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <a href="{{ route('admin.social.media.index') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center text-uppercase">
                                            <div class="fs-18 mb-1 fw-bold">Social Media</div>
                                            <div class="fw-bold">{{ $socialMedia }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <a href="{{ route('admin.banner.index') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center text-uppercase">
                                            <div class="fs-18 mb-1 fw-bold">Banner Item</div>
                                            <div class="fw-bold">{{ $banner }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <a href="{{ route('admin.our.service.index') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center text-uppercase">
                                            <div class="fs-18 mb-1 fw-bold">Services Item</div>
                                            <div class="fw-bold">{{ $service }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <a href="{{ route('admin.client.index') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center text-uppercase">
                                            <div class="fs-18 mb-1 fw-bold">Clients List</div>
                                            <div class="fw-bold">{{ $clients }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div> <!-- end sales -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection
