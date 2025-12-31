@extends('frontend.layouts.frontend_master')
@section('content')
    @include('frontend.partial.breadcrumb')
    <!-- ==================Working Gallery Section Start============================ -->
    <section class="working-photo">
        <div class="container">
            <div class="working-photo-title text-center">
                <h2>Working Photo</h2>
            </div>
            <!-- Filter Buttons -->
            <div class="controls text-center">
                <button type="button" class="filter" data-filter="all">All</button>
                @foreach ($workingPhotoCategory as $category)
                    <button type="button" class="filter" data-filter=".{{ $category->slug }}">{{ $category->name }}</button>
                @endforeach
            </div>

            <!-- photo Items -->
            <div class="row" id="mix-video-gallery">
                @foreach ($workingPhoto as $photo)
                    <div class="col-lg-4 col-md-6 mix {{ $photo->category->slug }}">
                        <a class="popup-photo" href="{{ asset('upload/workingPhotos/' . $photo->image) }}">
                            <div class="booth"
                                style="background-image: url('{{ asset('upload/workingPhotos/' . $photo->image) }}')">
                            </div>
                            <div class="booth-item text-center">
                                <p>{{ $photo->title }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ==================Working Gallery Section End============================ -->
    <!-- ==================Event video Section Start============================ -->
    <section class="working-video">
        <div class="container">
            <div class="working-photo-title text-center mb-5">
                <h2>Working Videos</h2>
            </div>
            <div class="row">
                @foreach ($videos as $video)
                    @php
                        preg_match('/(?:v=|youtu\\.be\\/)([a-zA-Z0-9_-]+)/', $video->youtube_url, $matches);
                        $videoId = $matches[1] ?? null;
                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <a class="popup-youtube" href="https://www.youtube.com/watch?v={{ $videoId }}">
                            <div class="booth"
                                style="background-image: url('{{ asset('upload/video_thumbnails/' . $video->thumbnail) }}')">
                                <div class="round-play">
                                    <i class="fa-solid fa-play"></i>
                                </div>
                            </div>
                            <div class="booth-item text-center">
                                <p>{{ $video->title }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ==================Event video Section End============================ -->
@endsection
