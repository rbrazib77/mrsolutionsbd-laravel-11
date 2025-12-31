@extends('admin.layouts.bashboard_master')
@section('title', 'Website SEO Settings')
@section('admin')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Website SEO Settings</h4>
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
                                        <th>Page</th>
                                        <th>Meta Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($seoSettings as $key => $seo)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ ucfirst($seo->page_name) }}</td>
                                            <td>{{ $seo->meta_title }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#editSocialModal{{ $seo->id }}">
                                                    Edit
                                                </button>

                                            </td>
                                        </tr>
                                        <!-- Seo Setting Edit Modal -->
                                        <div class="modal fade" id="editSocialModal{{ $seo->id }}" tabindex="-1"
                                            aria-labelledby="editSocialModalLabel{{ $seo->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <form action="{{ route('admin.seo.update', $seo->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="editSocialModalLabel{{ $seo->id }}">
                                                                Edit SEO - {{ ucfirst($seo->page_name) }}
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            {{-- Platform --}}
                                                            <div class="mb-3">
                                                                <label for="platform{{ $seo->id }}"
                                                                    class="form-label">Meta Title</label>
                                                                <input type="text" name="meta_title"
                                                                    id="platform{{ $seo->id }}"
                                                                    class="form-control @error('platform') is-invalid @enderror"
                                                                    value="{{ $seo->meta_title }}"
                                                                    placeholder="Meta Title">
                                                                @error('meta_title')
                                                                    <span class="text-danger"
                                                                        style="font-size: 14px;">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="example{{ $seo->id }}"
                                                                    class="form-label">Meta Description <small
                                                                        class="text-danger">
                                                                        (Max: 160 characters)
                                                                    </small></label>
                                                                <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror"
                                                                    id="example{{ $seo->id }}" rows="5" spellcheck="false" placeholder="Meta Description">{{ $seo->meta_description }}</textarea>
                                                                @error('description')
                                                                    <span class="text-danger"
                                                                        style="font-size: 14px;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="meta_keywords{{ $seo->id }}"
                                                                    class="form-label">Meta Keywords</label>
                                                                <input type="text" name="meta_keywords"
                                                                    id="meta_keywords{{ $seo->id }}"
                                                                    class="form-control @error('meta_keywords') is-invalid @enderror"
                                                                    value="{{ $seo->meta_keywords }}"
                                                                    placeholder="Meta Keywords">
                                                                @error('meta_keywords')
                                                                    <span class="text-danger"
                                                                        style="font-size: 14px;">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">OG Image</label>
                                                                <input name="og_image" class="form-control editImage"
                                                                    type="file">

                                                                @if ($seo->og_image)
                                                                    <img src="{{ asset('upload/seo/' . $seo->og_image) }}"
                                                                        alt="banner image"
                                                                        class="img-thumbnail mt-2 previewImage"
                                                                        style="width: 100%; height: 300px;">
                                                                @else
                                                                    <img src="{{ url('upload/no_image.jpg') }}"
                                                                        alt="no image"
                                                                        class="img-thumbnail mt-2 previewImage"
                                                                        style="width: 100%; height: 300px;">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Update</button>
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

    <script>
        document.querySelectorAll('.editImage').forEach((input, index) => {
            input.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const preview = this.closest('.mb-3').querySelector('.previewImage');
                    preview.src = URL.createObjectURL(file);
                }
            });
        });
    </script>
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
