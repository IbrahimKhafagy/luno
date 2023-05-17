@extends('admin/layouts/master')


@section('title')
    Add Slider
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
                        <div class="col-md-6">
                            <label for="name:en" class="form-label">Name en: </label>
                            <input type="text" data-validation="required" data-validation-required="required"
                                id="name:en" name="name:en" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Name ar: </label>
                            <input type="text" data-validation="required" data-validation-required="required"
                                id="name:en" name="name:ar" class="form-control">
                        </div>
                        <p>
                            <div class="col-md-6">
                                <label class="form-label">Description en: </label>
                                <input type="text" data-validation="required" data-validation-required="required"
                                    id="description:en" name="description:en" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Description ar: </label>
                                <input type="text" data-validation="required" data-validation-required="required"
                                    id="description:ar" name="description:ar" class="form-control">
                            </div>
                            <P></P>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h6>Photo :</h6>
                                    <input type="file" name="image" class="dropify">
                                </div>
                            </div>

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


                $.validate({
                    form: 'form'
                });
                $(document).ready(function() {
                    $("#form").submit(function(e) {
                        e.preventDefault();

                        let formData = new FormData(this);

                        $.ajax({
                            url: '{{ route('create.slider') }}',
                            type: 'POST',
                            dataType: "json",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                if ($.isEmptyObject(data.error)) {
                                    swal("Good job!", "Slider created succsessfuly!", "success");

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
                const form = document.getElementById('form')
                const errorElement = document.getElementById('error')

                form.addEventListener('submit', (e) => {
                            let messages = []
                            if (name: en.value === '' || name: en.value == null) {
                                messages.push('Name is required')
                            }
                            <script >

@endsection
