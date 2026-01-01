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
                    <h4 class="fs-18 fw-semibold m-0">New Page Section Title Create</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <a href="{{route('admin.pages.index')}}" class="btn btn-success">Pages Section Title
                            List</a>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm rounded-lg">

                        <div class="card-body">
                            <form action="{{ route('admin.pages.store') }}" method="POST">
                                @csrf
                                <!-- Page Name -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Page Name</label>
                                    <input type="text" name="page_name" class="form-control"
                                        placeholder="e.g. home, about, contact" required>
                                </div>

                                <!-- Sections -->
                                <h6 class="fw-bold">Sections</h6>
                                <div id="sections-wrapper">
                                    <div class="section-item p-3 mb-2 border rounded d-flex align-items-start gap-2">
                                        <div class="flex-grow-1">
                                            <input type="text" name="sections[0][name]" placeholder="Section Name"
                                                class="form-control mb-2" required>
                                            <input type="text" name="sections[0][title]" placeholder="Section Title"
                                                class="form-control" required>
                                        </div>
                                        <button type="button" class="btn btn-danger btn-sm remove-section">✕</button>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button type="button" id="add-section" class="btn btn-secondary btn-sm">+ Add Another
                                        Section</button>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Save Page & Sections</button>
                            </form>
                        </div>
                    </div>

                    <!-- Scripts -->
                    <script>
                        let sectionIndex = 1;

                        // Add Section
                        document.getElementById('add-section').addEventListener('click', function() {
                            let wrapper = document.getElementById('sections-wrapper');
                            let html = `
        <div class="section-item p-3 mb-2 border rounded d-flex align-items-start gap-2">
            <div class="flex-grow-1">
                <input type="text" name="sections[${sectionIndex}][name]" placeholder="Section Name" class="form-control mb-2" required>
                <input type="text" name="sections[${sectionIndex}][title]" placeholder="Section Title" class="form-control" required>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-section">✕</button>
        </div>`;
                            wrapper.insertAdjacentHTML('beforeend', html);
                            sectionIndex++;
                        });

                        // Remove Section
                        document.getElementById('sections-wrapper').addEventListener('click', function(e) {
                            if (e.target && e.target.classList.contains('remove-section')) {
                                e.target.parentElement.remove();
                            }
                        });
                    </script>

                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
@endsection
