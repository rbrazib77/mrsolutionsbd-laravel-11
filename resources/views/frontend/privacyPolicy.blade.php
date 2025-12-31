@extends('frontend.layouts.frontend_master')
@section('content')
    @include('frontend.partial.breadcrumb')
    <!-- ==================Privacy Policy Section Start============================ -->
    <section class="privacy-policy">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    @foreach ($privacy as $item)
                        <div class="privacy-policy-item">
                            <h2 class="privacy-policy-heading">{{ $item->heading }}</h2>
                            <p class="py-4">
                                {{ $item->content }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- ==================Privacy Policy Section End============================ -->
@endsection
