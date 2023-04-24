@extends('admin/layouts/master')


@section('title')
    create category
@endsection



@section('content')
    <div id="list-item-1" class="card fieldset border border-muted mt-0">

        <span class="fieldset-tile"></span>
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h6 class="card-title mb-0">Form Validation</h6>
                </div>
                <div class="card-body">
                    <form class="row g-3 basic-form" action="{{ route('store.category') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-3">
                            <label class="form-label">name en: </label>
                            <input type="text" name="name:en" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">name ar: </label>
                            <input type="text" name="name:ar" class="form-control" required>
                        </div>
                        <p>
                        <div class="col-md-3">
                            <label class="form-label">description en: </label>
                            <input type="text" name="description:en" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">description ar: </label>
                            <input type="text" name="description:ar" class="form-control" required>
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
                                    required></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>

    </div>
@endsection
