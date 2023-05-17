@extends('admin/layouts/master')


@section('title')
    Edit Brand
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
                    <form class="row g-3 basic-form" id="brandFormUpdate" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="text" name="brand_id" value={{ $brands->id }} style="display : none;" required>
                        {{-- action="{{ route('update-brand',$brands->id) }}" --}}
                        {{-- <div class="col-md-3">
                        <label class="form-label">Title en: </label>
                        <input type="text" value={{ $brands->name }} name="name" class="form-control @error('name')is-invalid @enderror" required>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                    </div> --}}
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-6">
                                <label class="form-label">الاسم {{ $locale }}</label>
                                <input type="text" name="name:{{ $locale }}" id="name:{{ $locale }}"
                                    data-validation="required" data-validation-required="required"
                                    class="form-control form-control-lg @error('name:{{ $locale }}') is-invalid @enderror"
                                    value="{{ $brands->translate($locale)->name }}" placeholder="...">
                            </div>
                            @error('name:{{ $locale }}')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        @endforeach
                        {{-- <div class="col-md-3">
                        <label class="form-label">Title ar: </label>
                        <input type="email" value="{{ $brands->name}}" name="name" class="form-control @error('name')is-invalid @enderror" required>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                    </div> --}}
                        <p>
                        <div class="card">
                            <div class="card-body">
                                <h6>Photo :</h6>
                                <input type="file" name="image" class="dropify"
                                    data-default-file="{{ asset('storage/images/brands/' . $brands->image) }}">
                            </div>
                        </div>

                        </p>
                        <div class="col-12">
                            <button type="submit" id="update_brand" class="btn btn-primary">update</button>
                        </div>
                    </form>
                </div>

            </div>
        @endsection



        @section('js')
            <script>
                $(document).on('click', '#update_brand', function(e) {
                    e.preventDefault();

                    var formData = new FormData($('#brandFormUpdate')[0]);

                    $.ajax({
                        type: 'post',
                        enctype: 'multipart/form-data',
                        url: "{{ route('update-brand') }}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function(data) {

                            swal("Good job!", "brand updated successfuly!", "success");
                            if (data.status == true) {
                                $('#success_msg').show();
                            }


                        },
                        error: function(reject) {}
                    });
                });
            </script>
        @endsection
