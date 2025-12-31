@extends('admin.layouts.bashboard_master')
@section('title', 'New Our Service Create')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">New Activities Create</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <a href="{{ route('admin.activity.index') }}" class="btn btn-success">Activities List</a>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{ route('admin.activity.store') }}" method="POST" >
                                        @csrf
                                        <div class="mb-3">
                                            <label for="example-email" class="form-label">Title</label>
                                            <input type="text" name="title" id="example-email"
                                                class="form-control @error('title') is-invalid @enderror"
                                                placeholder="Title" value="{{ old('title') }}">
                                            @error('title')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Description <small
                                                    class="text-danger">
                                                    (Max: 200 characters)
                                                </small></label>
                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="example-textarea"
                                                rows="5" spellcheck="false" placeholder="Description">{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-email" class="form-label">Order</label>
                                            <input type="text" name="sort_order" id="example-email"
                                                class="form-control @error('sort_order') is-invalid @enderror"
                                                placeholder="Order" value="{{ old('sort_order') }}">
                                            @error('sort_order')
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
@endsection
