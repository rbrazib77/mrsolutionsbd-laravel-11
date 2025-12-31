@extends('admin.layouts.bashboard_master')
@section('title', 'Admin-Website Setting')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Website Setting Update</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.website.update', $websiteSetting->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Main Logo<small class="text-danger">
                                                    (Recommended Size:270x65px)
                                                </small></label>
                                            <input name="main_logo" class="form-control" type="file" id="image">
                                            @error('main_logo')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <img id="showImage"
                                                src="{{ asset($websiteSetting->main_logo ?? 'upload/no_image.jpg') }}"
                                                alt="Main Logo" class="avatar-xxl img-thumbnail"
                                                style="width:270px;height:65px;">
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Footer Logo<small class="text-danger">
                                                    (Recommended Size:270x65px)
                                                </small></label>
                                            <input name="footer_logo" class="form-control" type="file" id="footer_logo">
                                            @error('footer_logo')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <img id="showFooterLogo"
                                                src="{{ asset($websiteSetting->footer_logo ?? 'upload/no_image.jpg') }}"
                                                class="avatar-xxl img-thumbnail bg-black"
                                                style="width: 270px; height: 65px;">
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Phone Icon<small class="text-danger">
                                                    (Recommended Size:24x24px)
                                                </small></label>
                                            <input name="phone_icon" class="form-control" type="file" id="phone_icon">
                                            @error('phone_icon')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <img id="showPhoneIcon"
                                                src="{{ asset($websiteSetting->phone_icon ?? 'upload/no_image.jpg') }}"
                                                alt="Main Logo" class="avatar-xxl img-thumbnail"
                                                style="width:65px;height:65px;">
                                        </div>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Phone One</label>
                                            <input type="text" name="phone_one" id="simpleinput"
                                                class="form-control @error('phone_one') is-invalid @enderror"
                                                placeholder="Phone" value="{{ $websiteSetting->phone_one }}">
                                            @error('phone_one')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">E-mail One</label>
                                            <input type="email" name="email_one" id="simpleinput"
                                                class="form-control @error('email_one') is-invalid @enderror"
                                                placeholder="E-mail" value="{{ $websiteSetting->email_one }}">
                                            @error('email_one')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-email" class="form-label">Address</label>
                                            <input type="text" name="address" id="example-email"
                                                class="form-control @error('address') is-invalid @enderror"
                                                placeholder="Address" value="{{ $websiteSetting->address }}">
                                            @error('address')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Footer Description</label>
                                            <textarea name="footer_description" class="form-control @error('footer_description') is-invalid @enderror"
                                                id="example-textarea" rows="10" spellcheck="false" placeholder="Footer Description">{{ $websiteSetting->footer_description }}</textarea>
                                            @error('footer_description')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Favicon <small class="text-danger">
                                                    (Recommended Size:30x30px)
                                                </small></label>
                                            <input name="favicon" class="form-control" type="file" id="fav_icon">
                                            @error('favicon')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <img id="showFavicon"
                                                src="{{ asset($websiteSetting->favicon ?? 'upload/no_image.jpg') }}"
                                                class="avatar-xxl img-thumbnail" alt="image profile"
                                                style="width:65px;height:65px;">
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Address Icon<small
                                                    class="text-danger">
                                                    (Recommended Size:24x24px)
                                                </small></label>
                                            <input name="address_icon" class="form-control" type="file"
                                                id="address_icon">
                                            @error('address_icon')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <img id="showAddressIcon"
                                                src="{{ asset($websiteSetting->address_icon ?? 'upload/no_image.jpg') }}"
                                                alt="Main Logo" class="avatar-xxl img-thumbnail"
                                                style="width:65px;height:65px;">
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Email Icon<small
                                                    class="text-danger">
                                                    (Recommended Size:24x24px)
                                                </small></label>
                                            <input name="email_icon" class="form-control" type="file"
                                                id="email_icon">
                                            @error('email_icon')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <img id="showEmailIcon"
                                                src="{{ asset($websiteSetting->email_icon ?? 'upload/no_image.jpg') }}"
                                                alt="Main Logo" class="avatar-xxl img-thumbnail"
                                                style="width:65px;height:65px;">
                                        </div>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Phone Two</label>
                                            <input type="text" name="phone_two" id="simpleinput"
                                                class="form-control @error('phone_two') is-invalid @enderror"
                                                placeholder="Phone" value="{{ $websiteSetting->phone_two }}">
                                            @error('phone_two')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">E-mail Two</label>
                                            <input type="email" name="email_two" id="simpleinput"
                                                class="form-control @error('email_two') is-invalid @enderror"
                                                placeholder="E-mail" value="{{ $websiteSetting->email_two }}">
                                            @error('email_two')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Copy Right</label>
                                            <input type="text" name="copy_right" id="simpleinput"
                                                class="form-control @error('copy_right') is-invalid @enderror"
                                                placeholder="Copy Right" value="{{ $websiteSetting->copy_right }}">
                                            @error('copy_right')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Map URL</label>
                                            <textarea name="map_url" rows="10" class="form-control @error('map_url') is-invalid @enderror"
                                                id="example-textarea" rows="5" spellcheck="false" placeholder="Map Url">{{ $websiteSetting->map_url }}</textarea>
                                            @error('map_url')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">

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
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            })
            // Favicon Preview
            $('#fav_icon').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showFavicon').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            // Footer Logo Preview
            $('#footer_logo').on('change', function(e) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#showFooterLogo').attr('src', e.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);
            });

            // Address Icon Preview
            $('#address_icon').on('change', function(e) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#showAddressIcon').attr('src', e.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);
            });
            // Email Icon Preview
            $('#email_icon').on('change', function(e) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#showEmailIcon').attr('src', e.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);
            });
            // Phone Icon Preview
            $('#phone_icon').on('change', function(e) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#showPhoneIcon').attr('src', e.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);
            });
        })
    </script>
@endsection
