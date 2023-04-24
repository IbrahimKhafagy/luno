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
                <form class="row g-3 basic-form" action="{{ route('update-brand',$brands->id) }}" method="POST"   enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-3">
                        <label class="form-label">Title en: </label>
                        <input type="text" value={{ $brands->name }} name="name" class="form-control @error('name')is-invalid @enderror" required>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                    </div>
                    {{-- <div class="col-md-3">
                        <label class="form-label">Title ar: </label>
                        <input type="email" value="{{ $brands->name}}" name="name" class="form-control @error('name')is-invalid @enderror" required>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                    </div> --}}
                    <p>
                    <div class="col-md-6">
                        <label class="form-label">Photo :</label>
                        <input type="file" value="{{$brands->image}}" name="image" class="form-control @error('image')is-invalid @enderror" rows="5" cols="30" required></textarea>
                                   @error('image')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                    </div>
                    </p>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">update</button>
                    </div>
                </form>
            </div>

</div>

@section('footer')

@endsection


@endsection




