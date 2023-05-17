@extends('admin/layouts/master')


@section('title' )
 Edit Slider
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
                 <form class="row g-3 basic-form"  id="categoryFormUpdate" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="category_id" value={{ $slider->id }} style="display : none;" required>
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
                <input type="text" name="name:{{ $locale }}" id="name:{{ $locale }}" data-validation="required"
                    data-validation-required="required"
                    class="form-control form-control-lg @error('name:{{ $locale }}') is-invalid @enderror"
                    value="{{ $category->translate($locale)->name }}" placeholder="...">
            </div>
            @error('name:{{ $locale }}')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror


            <div class="col-6">
                <label class="form-label">description {{ $locale }}</label>
                <input type="text" name="description:{{ $locale }}" id="description:{{ $locale }}" data-validation="required"
                    data-validation-required="required"
                    class="form-control form-control-lg @error('name:{{ $locale }}') is-invalid @enderror"
                    value="{{ $category->translate($locale)->name }}" placeholder="...">
            </div>
            @error('name:{{ $locale }}')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @endforeach

                    <div>
                        <div class="card">
                            <div class="card-body">
                              <h6>Photo :</h6>
                              <input type="file" name="image" class="dropify" data-default-file="{{ asset('storage/images/sliders/' . $slider->image) }}">
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
