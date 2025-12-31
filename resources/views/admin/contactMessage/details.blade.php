@extends('admin.layouts.bashboard_master')
@section('title', 'Single Contact Message Details')
@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Message Details</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <a href="{{ route('contact.message.index') }}" class="btn btn-success">Message List</a>
                    </ol>
                </div>
            </div>
            <!-- Responsive Datatable -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                           
                            <span class="badge text-bg-success mb-4">{{ $contactMessage->sort_order }}</span>
                            <table class="table table-bordered table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th width="15%">Title</th>
                                        <td>{{ $contactMessage->name }}</td>
                                    </tr>
                                    <tr>
                                        <th width="15%">E-mail</th>
                                        <td>{{ $contactMessage->email }}</td>
                                    </tr>
                                    <tr>
                                        <th width="15%">Phone</th>
                                        <td>{{ $contactMessage->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th width="15%">Message</th>
                                        <td>{{ $contactMessage->message }}</td>
                                    </tr>
                                    <tr>
                                        <th width="15%">Date</th>
                                        <td>{{ $contactMessage->created_at->format('d-m-Y') }}</td>
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
