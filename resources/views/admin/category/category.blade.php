@extends('admin/layouts/master')


@section('title')
 category
@endsection



@section('content')

<span class="fieldset-tile text-muted bg-body" > All Brands</span>
<div class="card">
    <div class="card-body">
            <table id="table_id" class="table key-buttons text-md-nowrap"data-page-length='50'>
                <thead>
                    <tr>
                        <th class="border-bottom-0">#</th>
                        <th class="border-bottom-0">Title</th>
                        <th class="border-bottom-0">Description</th>
                        <th class="border-bottom-0">Parent ID</th>
                        <th class="border-bottom-0">Photo</th>
                        <th class="border-bottom-0">process</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i=0 ?>
                    @foreach ($categories as $cat)

                        <?php $i++ ?>
                        {{-- <tr>
                        <td>{{$i}}</td>
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->description}}</td>
                        <td>{{$cat->parent_id == null ? 'Main Category' : $cat->parent?->name}}</td>
                        <td>
                            <img src="{{ asset('storage/images/categories/' . $cat->image) }}" style="width: 150px;height:120px" alt="">
                        </td>

                        <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Basic example">

                                    <a href="{{ route('edit.category',$cat->id)}}" type="button" class="btn btn-warning">Edit</a>
                                    <a href="{{route('destroy.category',$cat->id)}}" type="button" onclick="return confirm('Delete?')"
                                        class="btn btn-danger">Delete</a>
                                </div>
                        </td>




                    </tr> --}}

                    @endforeach
                </tbody>
            </table>
    </div>
</div>

@endsection

@push('javascripts')

<script type="text/javascript">
    $(function() {
        var table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ Route('category.all') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'parent_id',
                    name: 'parent_id'
                },
                {
                    data: 'image',
                    name: 'image'
                }
                ,{
                    data: 'process',
                    name: 'process'
                }

            ]
        });
    });
    $('#table_id tbody').on('click', '#deleteBtn', function(argument) {
        var id = $(this).attr("data-id");
        console.log(id);
        $('#deletemodal #id').val(id);
    })
</script>

@endpush()
@section('js')
    <script>
        $(document).on('click', '.delete_btn', function(e) {
            e.preventDefault();

            var data_id = $(this).attr('category_id')
            // alert(data_id);

            if (confirm("Are you sure you want to delete this item?")) {
                $.ajax({
                    type: "POST",
                    url: "{{route('delete.category')}}",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'id':data_id
                    },
                    success: function(response) {
                        swal("Good job!", "deleted succsessfuly!", "success");
                        $('#table_id').DataTable().ajax.reload();
                                        },
                    error: function(jqXHR, textStatus, errorThrown) {
                        swal("Error!", errorText, "error");
                    }
                });
            }
        });
    </script>
@endsection
