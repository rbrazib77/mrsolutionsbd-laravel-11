@extends('admin.layouts.bashboard_master')
@section('title', 'Admin Login/Logout History')
@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Admin Login/Logout History List</h4>
                </div>
            </div>
            <!-- Responsive Datatable -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="responsive-datatable"
                                class="table table-bordered table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>SI</th>
                                        <th>Admin</th>
                                        <th>IP Address</th>
                                        <th>Browser</th>
                                        <th>Device</th>
                                        <th>Login Time</th>
                                        <th>Logout Time</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($histories as $key => $history)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $history->user->name }}</td>
                                            <td>{{ $history->ip_address }}</td>
                                            <td>{{ $history->browser }}</td>
                                            <td>{{ $history->device }}</td>
                                            <td>{{ $history->logged_in_at }}</td>
                                            <td>{{ $history->logged_out_at }}</td>
                                            <td>
                                                @if (auth()->user()->role === 'user')
                                                    <button class="btn btn-danger" disabled>Delete</button>
                                                @else
                                                    <a href="javascript:void(0);" class="btn btn-danger delete-btn"
                                                        data-url="{{ route('admin.histories.destroy', $history->id) }}">Delete</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Login/Logout Count</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="responsive-datatable"
                                class="table table-bordered table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>SI</th>
                                        <th>Admin Name</th>
                                        <th>E-mail</th>
                                        <th>Total Logins</th>
                                        <th>Total Logouts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($summary as $key => $data)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $data['admin']->name }}</td>
                                            <td>{{ $data['email'] }}</td>
                                            <td>{{ $data['total_logins'] }}</td>
                                            <td>{{ $data['total_logouts'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('delete-btn')) {
                const url = e.target.dataset.url;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action will delete.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            }
        });
    </script>
@endpush
