@extends('admin.layouts.bashboard_master')
@section('title', 'New Working Video Create')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">About Section Update</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.about-section.update', $about->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form action="{{ route('admin.working-video.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="top_image" class="form-label">Top Image
                                                    <small class="text-danger">(jpeg, png, jpg, gif, webp, Recommended Size:
                                                        540x300px)</small>
                                                </label>
                                                <input name="top_image" class="form-control" type="file" id="top_image">
                                                @error('top_image')
                                                    <span class="text-danger"
                                                        style="font-size: 14px;">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <img id="preview_top"
                                                    src="{{ !empty($about->top_image) ? url('upload/abouts/' . $about->top_image) : url('upload/no_image.jpg') }}"
                                                    class="avatar-xxl img-thumbnail" alt="image profile"
                                                    style="width: 540px; height: 300px;">
                                            </div>
                                            <div class="mb-3">
                                                <label for="top_image" class="form-label">Bottom Right Image
                                                    <small class="text-danger">(jpeg, png, jpg, gif, webp, Recommended Size:
                                                        250x150px)</small>
                                                </label>
                                                <input name="bottom_right_image" class="form-control" type="file"
                                                    id="bottom_right_image">
                                                @error('bottom_right_image')
                                                    <span class="text-danger"
                                                        style="font-size: 14px;">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <img id="preview_bottom_right"
                                                    src="{{ !empty($about->bottom_right_image) ? url('upload/abouts/' . $about->bottom_right_image) : url('upload/no_image.jpg') }}"
                                                    class="avatar-xxl img-thumbnail" alt="image profile"
                                                    style="width: 250px; height: 150px;">
                                            </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="bottom_left_image" class="form-label">Bottom Left Image
                                                <small class="text-danger">(jpeg, png, jpg, gif, webp, Recommended Size:
                                                    250x150px)</small>
                                            </label>
                                            <input name="bottom_left_image" class="form-control" type="file"
                                                id="bottom_left_image">
                                            @error('bottom_left_image')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <img id="preview_bottom_left"
                                                src="{{ !empty($about->bottom_left_image) ? url('upload/abouts/' . $about->bottom_left_image) : url('upload/no_image.jpg') }}"
                                                class="avatar-xxl img-thumbnail" alt="image profile"
                                                style="width: 250px; height: 150px;">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-email" class="form-label">Small Title</label>
                                            <input type="text" name="small_title" id="example-email"
                                                class="form-control @error('small_title') is-invalid @enderror"
                                                placeholder="Small Title"
                                                value="{{ old('small_title', $about->small_title) }}">
                                            @error('small_title')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-email" class="form-label">Title</label>
                                            <input type="text" name="title" id="example-email"
                                                class="form-control @error('title') is-invalid @enderror"
                                                placeholder="Title" value="{{ old('title', $about->title) }}">
                                            @error('title')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Description <small
                                                    class="text-danger">
                                                    (Min: 200 characters, Max: 350 characters)
                                                </small></label>
                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="example-textarea"
                                                rows="5" spellcheck="false" placeholder="Description">{{ old('description', $about->description) }}</textarea>
                                            @error('description')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="editStatus{{ $about->id }}" class="form-label">Status</label>
                                            <select name="status" class="form-select"
                                                id="editStatus{{ $about->id }}">
                                                <option value="1"
                                                    {{ old('status', $about->status) == 1 ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="0"
                                                    {{ old('status', $about->status) == 0 ? 'selected' : '' }}>
                                                    Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bottom_left_image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview_bottom_left').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

            $('#top_image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview_top').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('#bottom_right_image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview_bottom_right').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
