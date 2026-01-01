@extends('admin.layouts.bashboard_master')
@section('title', 'About Section Create')
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
                            <form action="{{ route('admin.about-section.update', $aboutSection->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="example-email" class="form-label">Title<small
                                                    class="text-danger">
                                                    (Max: 250 characters)
                                                </small></label>
                                            <input type="text" name="title" id="example-email"
                                                class="form-control @error('title') is-invalid @enderror"
                                                placeholder="Title" value="{{ old('title', $aboutSection->title) }}">
                                            @error('title')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Description <small
                                                    class="text-danger">
                                                    (Min: 50 characters, Max: 700 characters)
                                                </small></label>
                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="example-textarea"
                                                rows="9" spellcheck="false" placeholder="Description">{{ old('description', $aboutSection->description) }}</textarea>
                                            @error('description')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="bottom_left_image" class="form-label">Image
                                                <small class="text-danger">(Recommended Size:550x300px)</small>
                                            </label>
                                            <input name="image" class="form-control" type="file"
                                                id="bottom_left_image">
                                            @error('image')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <img id="preview_bottom_left"
                                                src="{{ !empty($aboutSection->image) ? url('upload/abouts/' . $aboutSection->image) : url('upload/no_image.jpg') }}"
                                                class="avatar-xxl img-thumbnail" alt="image profile"
                                                style="width: 550px; height: 300px;">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editStatus{{ $aboutSection->id }}" class="form-label">Status</label>
                                            <select name="status" class="form-select"
                                                id="editStatus{{ $aboutSection->id }}">
                                                <option value="1"
                                                    {{ old('status', $aboutSection->status) == 1 ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="0"
                                                    {{ old('status', $aboutSection->status) == 0 ? 'selected' : '' }}>
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
