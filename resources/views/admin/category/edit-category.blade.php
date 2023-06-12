@extends('admin/layouts/master')


@section('title')
    Edit category
@endsection


@section('content')
    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div id="list-item-1" class="card fieldset border border-muted mt-0">

        <span class="fieldset-tile"></span>
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h6 class="card-title mb-0">Form Validation</h6>
                </div>
                <div class="card-body">
                    <form class="row g-3 basic-form" id="categoryFormUpdate" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="category_id" value={{ $category->id }} style="display : none;" required>
                        {{-- <div class="col-md-3">
                        <label class="form-label">name en: </label>
                        <input type="text" value={{ $category->name }} name="name"  class="form-control @error('name')is-invalid @enderror" required>

                                    @error('name')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                    </div> --}}


                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-6">
                                <label class="form-label">الاسم {{ $locale }}</label>
                                <input type="text" name="name:{{ $locale }}" id="name:{{ $locale }}"
                                    data-validation="required" data-validation-required="required"
                                    class="form-control form-control-lg @error('name:{{ $locale }}') is-invalid @enderror"
                                    value="{{ $category->translate($locale)->name }}" placeholder="...">
                            </div>
                            @error('name:{{ $locale }}')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror


                            <div class="col-6">
                                <label class="form-label">description {{ $locale }}</label>
                                <input type="text" name="description:{{ $locale }}"
                                    id="description:{{ $locale }}" data-validation="required"
                                    data-validation-required="required"
                                    class="form-control form-control-lg @error('name:{{ $locale }}') is-invalid @enderror"
                                    value="{{ $category->translate($locale)->name }}" placeholder="...">
                            </div>
                            @error('name:{{ $locale }}')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        @endforeach


                        {{-- <div class="col-md-3">
                        <label class="form-label">name ar: </label>
                        <input type="text" name="name:ar" class="form-control" required>
                    </div> --}}
                        <p>
                            {{-- <div class="col-md-3">
                        <label class="form-label">description en: </label>
                        <input type="text" value={{ $category->description }} name="description"  class="form-control @error('description')is-invalid @enderror" required>

                                    @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                    </div> --}}
                            {{-- <div class="col-md-3">
                        <label class="form-label">description ar: </label>
                        <input type="text" name="description:ar" class="form-control" required>
                    </div> --}}
                        <div>
                            <div class="col-md-6">
                                <label class="form-label">Parent ID: </label>
                                <select name="parent_id" class="form-control show-tick ms">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $category->parent_id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="card">
                                <div class="card-body">
                                    <h6>Photo :</h6>
                                    <input type="file" name="image" class="dropify"
                                        data-default-file="{{ asset('storage/images/categories/' . $category->image) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" id="update_category" class="btn btn-primary">update</button>
                        </div>
                    </form>
                </div>

            </div>
        @endsection

        @section('js')
            <script>
                $(document).on('click', '#update_category', function(e) {
                    e.preventDefault();

                    var formData = new FormData($('#categoryFormUpdate')[0]);
                    $.ajax({
                        type: 'post',
                        enctype: 'multipart/form-data',
                        url: "{{ route('update-category') }}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function(data) {

                            swal("Good job!", "Category updated successfuly!", "success");
                            if (data.status == true) {
                                $('#success_msg').show();
                            }


                        },
                        error: function(reject) {}
                    });
                });
            </script>
        @endsection
