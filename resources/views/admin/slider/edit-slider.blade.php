

<link rel="stylesheet" href="{{url('/')}}/admin/assets/cssbundle/dropify.min.css">




<form class="row g-3 formvalidate " id="sliderFormUpdate"  method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="slider_id" value={{ $slider->id }} >

{{-- //////////////////////////////////////////////////////////////////////// --}}
    {{-- <div class="col-md-6">
            <label for="name" class="form-label">Name en: </label>
            <input type="text"  data-validation="required" data-validation-required="required"
                id="name" name="name" class="form-control">
        </div> --}}
    {{-- <div class="col-md-6">
            <label class="form-label">Name ar: </label>
            <input type="text" data-validation="required" data-validation-required="required"
                id="name:ar" name="name:ar" class="form-control">
        </div> --}}

    @foreach (config('translatable.locales') as $locale)
        <div class="col-6">
            <label class="form-label">الاسم {{ $locale }}</label>
            <input type="text" name="name:{{ $locale }}"
                id="name:{{ $locale }}" data-validation="required"
                data-validation-required="required"
                class="form-control form-control-lg @error('name:{{ $locale }}') is-invalid @enderror"
            value="{{ $slider->translate($locale)->name }}" placeholder="...">
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
            value="{{ $slider->translate($locale)->description }}" placeholder="...">
        </div>
        @error('name:{{ $locale }}')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endforeach
{{-- ////////////////////////////////////////////////////////// --}}
    <p>
        
    <P></P>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6>Photo :</h6>
                <input type="file" name="image" data-default-file="{{ asset('storage/images/sliders/'.$slider->image) }}" class="dropify">
            </div>
        </div>

    </div>
    </p>
    <div class="col-12">
        <button type="submit" id="update_slider" class="btn btn-primary">Update</button>
    </div>
</form>




<script>
    $(document).on('click', '#update_slider', function(e) {
        e.preventDefault();

        var formData = new FormData($('#sliderFormUpdate')[0]);

        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "{{ route('update-slider') }}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {

                swal("Good job!", "Slider Updated Successfuly!", "success");
                if (data.status == true) {
                $('#success_msg').show()
                }
                location.reload();

        },
            error: function(reject) {}
        });
    });
</script>


<script src="{{url('/')}}/admin/assets/js/bundle/dropify.bundle.js"></script>

<script>
    $('.dropify').dropify();

</script>








