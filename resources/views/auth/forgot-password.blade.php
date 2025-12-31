<!DOCTYPE html>
<html lang="en">
@php
    $setting = \App\Models\WebsiteSetting::first();
@endphp

<head>

    <meta charset="utf-8" />
    <title>Admin Recover Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('upload/settings/' . $setting->fav_icon) }}">

    <!-- App css -->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="bg-white">

    <!-- Begin page -->
    <div class="account-page">
        <div class="container-fluid p-0">
            <div class="row align-items-center g-0">
                <div class="col-xl-5">
                    <div class="row">
                        <div class="col-md-7 mx-auto">
                            <div class="mb-0 border-0 p-md-5 p-lg-0 p-4">
                                <div class="mb-4 p-0 text-center">

                                    <a href="{{ route('admin.login') }}" class="auth-logo">
                                        <img src="{{ asset('upload/settings/' . $setting->logo) }}" alt="logo-dark"
                                            class="mx-auto" height="100" />
                                    </a>
                                    <h3
                                        style="font-weight: 800; color:#ed1b24;text-align: center; text-transform: uppercase; margin-top: 20px;">
                                        SK Solutions
                                    </h3>
                                </div>
                                <!-- Success message -->
                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <!-- Error message -->

                                <div class="pt-0">
                                    <form method="POST" action="{{ route('admin.password.email') }}" class="my-4">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="emailaddress" class="form-label">Email address</label>
                                            <input class="form-control" name="email" type="email" id="emailaddress"
                                                required="" placeholder="Enter your email">
                                            @error('email')
                                                <div class="mb-4 font-medium text-sm text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary" type="submit"> Recover Password
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="text-center text-muted">
                                        <p class="mb-0">Change the mind ?<a class='text-primary ms-2 fw-medium'
                                                href='{{ route('admin.login') }}'>Back to Login</a></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-7">
                    <div class="account-page-bg p-md-5 p-4">
                        <div class="text-center">
                            <h3 class="text-dark mb-3 pera-title">Quick, Effective, and Productive With SK Solutions
                                Admin
                                Dashboard</h3>
                            <div class="auth-image">
                                <img src="{{ asset('backend/assets/images/authentication.svg') }}"
                                    class="mx-auto img-fluid" alt="images">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/feather-icons/feather.min.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>

</body>

</html>
