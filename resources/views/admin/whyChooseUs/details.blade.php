@extends('admin.layouts.bashboard_master')
@section('title', 'Why Choose Us Details')
@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Why choose us Details</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-success">Why choose us List</a>
                    </ol>
                </div>
            </div>
            <!-- Responsive Datatable -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            Why choose us Details
                            <span class="badge text-bg-success mb-4">{{ $whyFeature->sort_order }}</span>
                            <table class="table table-bordered table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th width="15%">Title</th>
                                        <td>{{ $whyFeature->title }}</td>
                                    </tr>
                                    <tr>
                                        <th width="15%">Description</th>
                                        <td>{{ $whyFeature->description }}</td>
                                    </tr>
                                    <tr>
                                        <th width="15%">Order</th>
                                        <td>{{ $whyFeature->sort_order }}</td>
                                    </tr>
                                    <tr>
                                        <th width="15%">Status</th>
                                        <td>
                                            <button type="button"
                                                class="toggle-status btn btn-sm {{ $whyFeature->status ? 'btn-primary' : 'btn-secondary' }}">
                                                {{ $whyFeature->status ? 'Active' : 'Inactive' }}
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th width="15%">Date</th>
                                        <td>{{ $whyFeature->created_at->format('d-m-Y') }}</td>
                                    </tr>

                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
@endsection
