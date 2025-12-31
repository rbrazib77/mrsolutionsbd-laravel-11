

@extends('admin.layouts.bashboard_master')
@section('title', 'Social Media Link Create')
@section('admin')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">New Menu Create</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <a href="{{ route('admin.menu.index') }}" class="btn btn-success">Menu
                            List</a>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{ route('admin.menu.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Main Menu</label>
                                            <input type="text" name="title" id="simpleinput"
                                                class="form-control @error('title') is-invalid @enderror" placeholder="Name"
                                                value="{{ old('title') }}">
                                            @error('title')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Main Menu</label>
                                            <select name="parent_id" class="form-select">
                                                <option value="">Main Menu</option>
                                                @foreach ($parents as $parent)
                                                    <option value="{{ $parent->id }}">{{ $parent->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-4 mt-3">
                                            <label for="example-email" class="form-label">URL</label>
                                            <input type="text" name="url" id="example-email"
                                                class="form-control @error('url') is-invalid @enderror" placeholder="URL (optional)"
                                                value="{{ old('url') }}">
                                            @error('url')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-email" class="form-label">Order</label>
                                            <input type="number" name="order_by" id="example-email"
                                                class="form-control @error('order_by') is-invalid @enderror"
                                                placeholder="Order" value="{{ old('order_by') }}">
                                            @error('order_by')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Status</label>
                                            <select name="status" class="form-select" id="example-select">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
    <script>
        function updateIconPreview() {
            const iconClass = document.getElementById('iconPicker').value;
            const preview = document.getElementById('iconPreview');
            preview.className = 'icon-preview ' + iconClass;
        }
    </script>
@endsection
