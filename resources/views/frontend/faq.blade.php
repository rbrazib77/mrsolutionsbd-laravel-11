@extends('frontend.layouts.frontend_master')
@section('content')
    @include('frontend.partial.breadcrumb')
    <!-- ==================FAQ Section Start============================ -->
    <section class="faq">
        <div class="container py-5">
            <h1 class="mb-5 text-center">Frequently Asked Questions</h1>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion" id="faqAccordion">
                        @foreach ($faqs as $index => $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="q{{ $index }}">
                                    <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#a{{ $index }}"
                                        aria-expanded="{{ $index == 0 ? 'true' : 'false' }}">
                                        {{ $faq->question }}
                                        <i class="fas fa-chevron-down custom-chevron"></i>
                                    </button>
                                </h2>
                                <div id="a{{ $index }}"
                                    class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        {!! $faq->answer !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ==================FAQ Section End============================ -->
@endsection
