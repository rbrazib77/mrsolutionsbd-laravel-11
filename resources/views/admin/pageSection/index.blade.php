@extends('admin.layouts.bashboard_master')
@section('title', 'Menu List')
@section('admin')
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Pages Section List</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <a href="{{ route('admin.pages.create') }}" class="btn btn-success">New Pages Section
                            Create</a>
                    </ol>
                </div>
            </div>
            <!-- Responsive Datatable -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="responsive-datatable"
                                class="table table-bordered table-bordered dt-responsive nowrap">

                                <tbody>
                                    @foreach ($pages as $pageName => $sections)
                                        <h3>Page: {{ $pageName }}</h3>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Section Name</th>
                                                    <th>Title</th>
                                                    <th>Status</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $sl = 1; @endphp
                                                @foreach ($sections as $section)
                                                    <tr>
                                                        <td>{{ $sl++ }}</td>
                                                        <td>{{ $section->section_name }}</td>
                                                        <td>{{ $section->title }}</td>

                                                        <td>
                                                            <a href=""
                                                                class="badge {{ $section->status ? 'text-bg-primary' : 'text-bg-secondary' }}">
                                                                {{ $section->status ? 'Active' : 'Inactive' }}
                                                            </a>
                                                        <td>{{ $section->created_at->format('d-m-Y') }}</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="btn btn-danger delete-btn"
                                                                data-url="">Delete</a>
                                                            {{-- <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#editMenuModal{{ $menu->id }}">Edit</button> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: @json(session('success')),
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if (session('delete'))
        <script>
            Swal.fire({
                icon: 'warning',
                title: @json(session('delete')),
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    <script>
        document.querySelectorAll('.toggle-status').forEach(button => {
            button.addEventListener('click', function() {
                let url = this.dataset.url;
                let action = this.dataset.status;

                Swal.fire({
                    title: 'Are you sure?',
                    text: `You are about to ${action} this Services .`,
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonText: `Yes, ${action} it!`,
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
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
