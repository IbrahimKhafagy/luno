@extends('admin/layouts/master')


@section('title' )
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
                 <form class="row g-3 basic-form" action="{{ route('update-category',$category->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-3">
                        <label class="form-label">name en: </label>
                        <input type="text" value={{ $category->name }} name="name"  class="form-control @error('name')is-invalid @enderror" required>

                                    @error('name')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                    </div>
                    {{-- <div class="col-md-3">
                        <label class="form-label">name ar: </label>
                        <input type="text" name="name:ar" class="form-control" required>
                    </div> --}}
                    <p>
                    <div class="col-md-3">
                        <label class="form-label">description en: </label>
                        <input type="text" value={{ $category->description }} name="description"  class="form-control @error('description')is-invalid @enderror" required>

                                    @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                    </div>
                    {{-- <div class="col-md-3">
                        <label class="form-label">description ar: </label>
                        <input type="text" name="description:ar" class="form-control" required>
                    </div> --}}
                    <div>
                        <div class="col-md-6">
                            <label class="form-label">Parent ID: </label>
                            <select name="parent_id" class="form-control show-tick ms">
                                <option value="">Select Category</option>
                                {{-- @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-6">
                            <label class="form-label">Photo :</label>
                            <input type="file" value="{{$category->image}}"  name="image" class="form-control @error('image')is-invalid @enderror" rows="5" cols="30"
                                required>

                                @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">update</button>
                    </div>
                </form>
            </div>

        </div>

@endsection

