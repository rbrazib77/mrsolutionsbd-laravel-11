@extends('admin.layouts.bashboard_master')
@section('title', 'Why Choose Us Section Update')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Why Choose Us Section Update</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{ route('admin.why-choose-us.heading.update', $whysection->id) }}"
                                        method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="example-email" class="form-label">Heading <small
                                                    class="text-danger">
                                                    (Max: 30 characters)
                                                </small></label>
                                            <input type="text" name="section_title" id="example-email"
                                                class="form-control @error('section_title') is-invalid @enderror"
                                                placeholder="Heading"
                                                value="{{ old('section_title', $whysection->section_title) }}">
                                            @error('section_title')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Sub Heading <small
                                                    class="text-danger">
                                                    (Max: 200 characters)
                                                </small></label>
                                            <textarea name="section_subtitle" class="form-control @error('section_subtitle') is-invalid @enderror"
                                                id="example-textarea" rows="5" spellcheck="false" placeholder="Sub Heading">{{ old('section_subtitle', $whysection->section_subtitle) }}</textarea>
                                            @error('section_subtitle')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endsection
