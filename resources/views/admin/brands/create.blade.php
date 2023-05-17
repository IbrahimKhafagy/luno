@extends('admin/layouts/master')


@section('title')
    Add Brand
@endsection


@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


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
                    <div id="error"></div>
                    <form class="row g-3 formvalidate" id="form" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-3">
                            <label for="name:en" class="form-label">name en: </label>
                            <input type="text" data-validation="required" data-validation-required="required"
                                id="name:en" name="name:en" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">name ar: </label>
                            <input type="text" data-validation="required" data-validation-required="required"
                                id="name:en" name="name:ar" class="form-control">
                        </div>
                        <p>
                        <div class="col-md-6">
                            {{-- <label class="form-label">Photo :</label>
                            <input type="file" name="image" class="form-control"> --}}
                            <div class="card">
                                <div class="card-body">
                                    <h6>Photo :</h6>
                                    <input type="file" name="image" class="dropify">
                                </div>
                            </div>

                            {{-- <div class="card">
                                <div class="card-body">
                                    <h6>Limit file size <small>try to upload file larger than 100 KB</small></h6>
                                    <input type="file" class="dropify" data-max-file-size="100K">
                                </div>
                            </div> --}}

                        </div>
                        </p>
                        <div class="col-12">
                            <button type="submit" id="btn-submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>

            </div>
        @endsection
        @section('js')
            <script type="text/javascript">
                // $('.dropify').dropify();

                $.validate({
                    form: 'form'
                });
                $(document).ready(function() {
                    $("#form").submit(function(e) {
                        e.preventDefault();

                        let formData = new FormData(this);

                        $.ajax({
                            url: '{{ route('create.brand') }}',
                            type: 'POST',
                            dataType: "json",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                if ($.isEmptyObject(data.error)) {
                                    swal("Good job!", "created succsessfuly!", "success");

                                    $('#form')[0].reset();
                                    console.log(response);
                                }
                           },
                            error: function(data) {
                                var errorText = '';
                                if (data.responseJSON.hasOwnProperty('errors')) {
                                    $.each(data.responseJSON.errors, function(key, value) {
                                        errorText += value + '\n';
                                    });
                                } else {
                                    errorText = 'An error occurred.';
                                }
                                swal("Error!", errorText, "error");
                            }
                        });

                    });

                });
            </script>


            <script>
                const name = document.getElementById('name:en')
                // const password = document.getElementById('image')
                const form = document.getElementById('form')
                const errorElement = document.getElementById('error')

                form.addEventListener('submit', (e) => {
                            let messages = []
                            if (name: en.value === '' || name: en.value == null) {
                                messages.push('Name is required')
                            }

                            // if (password.value.length <= 6) { messages.push('Password must be longer than 6 characters') } if
                            //     (password.value.length>= 20) {
                            //     messages.push('Password must be less than 20 characters')
                            //     }

                            // if (password.value === 'password') {
                            // messages.push('Password cannot be password')
                            // }

                            // if (messages.length > 0) {
                            // e.preventDefault()
                            // errorElement.innerText = messages.join(', ')
                            // }
                            // })

                            <script >
                            @endsection
