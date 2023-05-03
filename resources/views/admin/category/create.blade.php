@extends('admin/layouts/master')


@section('title')
    create category
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
                    <form class="row g-3 basic-form" id="form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-3">
                            <label class="form-label">name en: </label>
                            <input type="text" data-validation="required" data-validation-required="required" id="name:en"  name="name:en" class="form-control" >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">name ar: </label>
                            <input type="text" data-validation="required" data-validation-required="required" id="name:ar" name="name:ar" class="form-control" >
                        </div>
                        <p>
                        <div class="col-md-3">
                            <label class="form-label">description en: </label>
                            <input type="text" data-validation="required" data-validation-required="required" id="description:en" name="description:en" class="form-control" >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">description ar: </label>
                            <input type="text" data-validation="required" data-validation-required="required" id="description:ar" name="description:ar" class="form-control" >
                        </div>
                        <div>
                            <div class="col-md-6">
                                <label class="form-label">Parent ID: </label>
                                <select name="parent_id" class="form-control show-tick ms">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-6">
                                <label class="form-label">Photo :</label>
                                <input type="file" name="image" class="form-control" rows="5" cols="30"
                                    ></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Create</button>
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
        url: '{{route('store.category')}}',
        type: 'POST',
        dataType: "json",
        data: formData,
        contentType:false,
        processData:false,
        success: function(data) {
            if ($.isEmptyObject(data.error)) {
                alert('category created successfuly');
                $('#form')[0].reset();
                console.log(response);
                } else {
                    printErrorMsg(data.error);
                }

        }
    });

    });

});


    function printErrorMsg(msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display', 'block');
        $.each(msg, function(key, value) {
            $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
        });
    }
</script>


<script>
    const name = document.getElementById('name:en')
    const description = document.getElementById('description:en')
    // const password = document.getElementById('image')
    const form = document.getElementById('form')
    const errorElement = document.getElementById('error')

    form.addEventListener('submit', (e) => {
    let messages = []
    if (name:en.value === '' || name:en.value == null) {
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

<script>
    @endsection
