@extends('admin/layouts/master')

@section('title')
create product
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
                <form class="row g-3 basic-form" action="{{ route('store.product') }}" method="post"
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
                            <label class="form-label">category ID: </label>
                            <select name="category_id" class="form-control show-tick ms">
                                <option value="">Select Category</option>
                                {{-- @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-6">
                            <label class="form-label">Photo :</label>
                            <input type="file" name="image" class="form-control" rows="5" cols="30"
                                required></textarea>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Price:</label>
                            <input type="text" name="Price" class="form-control" rows="5" cols="30"
                                required></textarea>
                        </div>
                        <p></p>
                        <div class="col-md-3">
                            <label class="form-label">have offer</label>
                            <select name="travel" id="travel" class="form-control show-tick ms" onChange=showHide() >

                                required></textarea>
                                <option value="1">yes</option>
                                <option value="0">no</option>
                            </select>
                        </div>
                        <p></p>
                        <div class="col-md-3"  name="hidden-panel" id="hidden-panel">
                            <label class="form-label">offer type</label>
                            <select name="category_id" class="form-control show-tick ms"

                                required></textarea>
                                <option value="">percentage</option>
                                <option value="">offer value</option>
                            </select>

                        <p></p>


                        </div>
                    </div>
                        <div class="col-md-3">
                        <label class="form-label">Finally price</label>
                        <input type="text" name="Price" class="form-control" rows="5" cols="30"
                                required readonly>
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
<script>
function showHide() {
    let travelhistory = document.getElementById('travel')
    if (travelhistory.value == 1) {
        document.getElementById('hidden-panel').style.display = 'block'
    } else {
        document.getElementById('hidden-panel').style.display = 'none'
    }
}
</script>




<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" > </script>
<script>
    $(document).ready(function() {
        $("#travel").change(function() {
            if ($("#travel").val() == 1) {
                $("#hidden-panel").show()
            } else {
                $("#hidden-panel").hide()
            }
        })
    });
</script>
@endsection
