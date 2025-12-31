 @extends('admin.layouts.bashboard_master')
 @section('title', 'FAQ Item List')
 @section('admin')
     <div class="content">

         <!-- Start Content-->
         <div class="container-xxl">

             <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                 <div class="flex-grow-1">
                     <h4 class="fs-18 fw-semibold m-0">Faq List</h4>
                 </div>

                 <div class="text-end">
                     <ol class="breadcrumb m-0 py-0">
                         <a href="{{ route('admin.faq.create') }}" class="btn btn-success">New Faq Create</a>
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
                                         <th>Question</th>
                                         <th>Answer</th>
                                         <th>status</th>
                                         <th>Order</th>
                                         <th>Date</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($faqs as $key => $item)
                                         <tr>
                                             <td>{{ $key + 1 }}</td>
                                             <td>
                                                 {{ $item->question }}
                                             </td>
                                             <td>{{ Str::words($item->answer, 4, '......') }}</td>
                                             <td>
                                                 <a href="javascript:void(0);"
                                                     class="toggle-status  {{ $item->status ? 'badge text-bg-primary' : 'badge text-bg-secondary' }}"
                                                     data-url="{{ route('admin.faq.active.deactive', $item->id) }}"
                                                     data-status="{{ $item->status ? 'deactivate' : 'activate' }}">
                                                     {{ $item->status ? 'Active' : 'Inactive' }}
                                                 </a>
                                             </td>
                                             <td>{{ $item->sort_order }}</td>
                                             <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                             <td>
                                                 <a href="{{ route('admin.faq.details', $item->id) }}"
                                                     class="btn btn-primary">View</a>
                                                 <a href="javascript:void(0);" class="btn btn-danger delete-btn"
                                                     data-url="{{ route('admin.faq.destroy', $item->id) }}">Delete</a>
                                                 <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                     data-bs-target="#editBannerModal{{ $item->id }}">
                                                     Edit
                                                 </button>
                                             </td>
                                         </tr>
                                         <!-- Modal -->
                                         <div class="modal fade" id="editBannerModal{{ $item->id }}" tabindex="-1"
                                             aria-labelledby="editBannerModalLabel{{ $item->id }}" aria-hidden="true">
                                             <div class="modal-dialog modal-xl">
                                                 <div class="modal-content">
                                                     <form action="{{ route('admin.faq.update', $item->id) }}"
                                                         method="POST">
                                                         @csrf
                                                         <div class="modal-header">
                                                             <h5 class="modal-title"
                                                                 id="editBannerModalLabel{{ $item->id }}">Edit
                                                                 Question Answer <span
                                                                     class="badge text-bg-success">{{ $item->sort_order }}</span>
                                                             </h5>
                                                             <button type="button" class="btn-close"
                                                                 data-bs-dismiss="modal" aria-label="Close"></button>
                                                         </div>

                                                         <div class="modal-body">


                                                             <div class="mb-3">
                                                                 <label for="simpleinput"
                                                                     class="form-label">Question</label>
                                                                 <input type="text" name="question" id="simpleinput"
                                                                     class="form-control @error('question') is-invalid @enderror"
                                                                     placeholder="Question" value="{{ $item->question }}">
                                                                 @error('question')
                                                                     <span class="text-danger"
                                                                         style="font-size: 14px;">{{ $message }}</span>
                                                                 @enderror
                                                             </div>
                                                             <div class="mb-3">
                                                                 <label for="example-textarea"
                                                                     class="form-label">Answer</label>
                                                                 <textarea name="answer" class="form-control @error('answer') is-invalid @enderror" id="example-textarea" rows="5"
                                                                     spellcheck="false" placeholder="Answer">{{ $item->answer }}</textarea>
                                                                 @error('answer')
                                                                     <span class="text-danger"
                                                                         style="font-size: 14px;">{{ $message }}</span>
                                                                 @enderror
                                                             </div>
                                                             <div class="mb-3">
                                                                 <label for="editTitle{{ $item->id }}"
                                                                     class="form-label">Order</label>
                                                                 <input type="text" name="sort_order"
                                                                     id="editTitle{{ $item->id }}" class="form-control"
                                                                     value="{{ old('sort_order', $item->sort_order) }}">
                                                             </div>
                                                             <div class="mb-3">
                                                                 <label for="editStatus{{ $item->id }}"
                                                                     class="form-label">Status</label>
                                                                 <select name="status" class="form-select"
                                                                     id="editStatus{{ $item->id }}">
                                                                     <option value="1"
                                                                         {{ old('status', $item->status) == 1 ? 'selected' : '' }}>
                                                                         Active</option>
                                                                     <option value="0"
                                                                         {{ old('status', $item->status) == 0 ? 'selected' : '' }}>
                                                                         Deactive</option>
                                                                 </select>
                                                             </div>
                                                         </div>

                                                         <div class="modal-footer">
                                                             <button type="submit" class="btn btn-primary">Update
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
