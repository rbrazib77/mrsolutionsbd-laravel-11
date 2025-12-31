@extends('admin.layouts.bashboard_master')
@section('title', 'Menu List')
@section('admin')
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Menu List</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <a href="{{ route('admin.menu.create') }}" class="btn btn-success">New Menu
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
                                <thead>
                                    <tr>
                                        <th>SI</th>
                                        <th>Menu Name</th>
                                        <th>Type</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sl = 1; @endphp

                                    @foreach ($menus as $menu)
                                        <tr>
                                            <td>{{ $sl }}</td>
                                            <td><strong>{{ $menu->title }}</strong></td>
                                            <td>Main Menu</td>
                                            <td>{{ $menu->order_by }}</td>
                                            <td>
                                                <a href="{{ route('admin.menu.active.deactive', $menu->id) }}"
                                                    class="badge {{ $menu->status ? 'text-bg-primary' : 'text-bg-secondary' }}">
                                                    {{ $menu->status ? 'Active' : 'Inactive' }}
                                                </a>
                                            </td>
                                            <td>{{ $menu->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-danger delete-btn"
                                                    data-url="{{ route('admin.menu.destroy', $menu->id) }}">Delete</a>
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#editMenuModal{{ $menu->id }}">Edit</button>
                                            </td>
                                        </tr>
                                        @php $sl++; @endphp

                                        @foreach ($menu->children as $child)
                                            <tr>
                                                <td>{{ $sl }}</td>
                                                <td class="ps-4">— {{ $child->title }}</td>
                                                <td>Sub Menu</td>
                                                <td>{{ $child->order_by }}</td>
                                                <td>
                                                    <a href="{{ route('admin.menu.active.deactive', $child->id) }}"
                                                        class="badge {{ $child->status ? 'text-bg-primary' : 'text-bg-secondary' }}">
                                                        {{ $child->status ? 'Active' : 'Inactive' }}
                                                    </a>
                                                </td>
                                                <td>{{ $child->created_at->format('d-m-Y') }}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-danger delete-btn"
                                                        data-url="{{ route('admin.menu.destroy', $child->id) }}">Delete</a>
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#editMenuChildModal{{ $child->id }}">Edit</button>
                                                </td>
                                            </tr>
                                            @php $sl++; @endphp
                                            <div class="modal fade" id="editMenuChildModal{{ $child->id }}"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">

                                                        <form action="{{ route('admin.menu.update', $child->id) }}"
                                                            method="POST">
                                                            @csrf

                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Sub Menu</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="row">

                                                                    <div class="col-md-6 mb-3">
                                                                        <label class="form-label">Sub Menu Title</label>
                                                                        <input type="text" name="title"
                                                                            class="form-control"
                                                                            value="{{ $child->title }}">
                                                                    </div>

                                                                    <div class="col-md-6 mb-3">
                                                                        <label class="form-label">Parent Menu</label>
                                                                        <select name="parent_id" class="form-select">
                                                                            <option value="">Main Menu</option>
                                                                            @foreach ($parents as $parent)
                                                                                <option value="{{ $parent->id }}"
                                                                                    {{ $child->parent_id == $parent->id ? 'selected' : '' }}>
                                                                                    {{ $parent->title }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-6 mb-3">
                                                                        <label class="form-label">URL</label>
                                                                        <input type="text" name="url"
                                                                            class="form-control"
                                                                            value="{{ $child->url }}">
                                                                    </div>

                                                                    <div class="col-md-3 mb-3">
                                                                        <label class="form-label">Order</label>
                                                                        <input type="number" name="order_by"
                                                                            class="form-control"
                                                                            value="{{ $child->order_by }}">
                                                                    </div>

                                                                    <div class="col-md-3 mb-3">
                                                                        <label class="form-label">Status</label>
                                                                        <select name="status" class="form-select">
                                                                            <option value="1"
                                                                                {{ $child->status ? 'selected' : '' }}>
                                                                                Active
                                                                            </option>
                                                                            <option value="0"
                                                                                {{ !$child->status ? 'selected' : '' }}>
                                                                                Inactive
                                                                            </option>
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">
                                                                    Update
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="modal fade" id="editMenuModal{{ $menu->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">

                                                    <form action="{{ route('admin.menu.update', $menu->id) }}"
                                                        method="POST">
                                                        @csrf

                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Main Menu</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row">

                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label">Menu Title</label>
                                                                    <input type="text" name="title"
                                                                        class="form-control" value="{{ $menu->title }}">
                                                                </div>

                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label">Parent Menu</label>
                                                                    <select name="parent_id" class="form-select">
                                                                        <option value="">Main Menu</option>
                                                                        @foreach ($parents as $parent)
                                                                            <option value="{{ $parent->id }}"
                                                                                {{ $menu->parent_id == $parent->id ? 'selected' : '' }}>
                                                                                {{ $parent->title }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label">URL</label>
                                                                    <input type="text" name="url"
                                                                        class="form-control" value="{{ $menu->url }}">
                                                                </div>

                                                                <div class="col-md-3 mb-3">
                                                                    <label class="form-label">Order</label>
                                                                    <input type="number" name="order_by"
                                                                        class="form-control"
                                                                        value="{{ $menu->order_by }}">
                                                                </div>

                                                                <div class="col-md-3 mb-3">
                                                                    <label class="form-label">Status</label>
                                                                    <select name="status" class="form-select">
                                                                        <option value="1"
                                                                            {{ $menu->status ? 'selected' : '' }}>Active
                                                                        </option>
                                                                        <option value="0"
                                                                            {{ !$menu->status ? 'selected' : '' }}>Inactive
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">
                                                                Update
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
