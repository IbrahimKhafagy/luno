@extends('admin/layouts/master')

@section('title')
Products
@endsection

@section('content')

<span class="fieldset-tile text-muted bg-body" >All Products</span>
<div class="">
    <div class="card-body">
            <table id="table_id" class="table key-buttons text-md-nowrap"data-page-length='50'>
                <thead>
                    <tr>
                        <th class="border-bottom-0">#</th>
                        <th class="border-bottom-0">Title</th>
                        <th class="border-bottom-0">Description</th>
                        <th class="border-bottom-0">cat_ID</th>
                        <th class="border-bottom-0">Price</th>
                        <th class="border-bottom-0">Discount</th>
                        <th class="border-bottom-0">type</th>
                        <th class="border-bottom-0">value</th>
                        <th class="border-bottom-0">price</th>
                        <th class="border-bottom-0">Photo</th>
                        <th class="border-bottom-0">process</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0 ?>
                     @foreach ($products as $product)

                        <?php $i++ ?>
                        {{-- <tr>
                        <td>{{$i}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->have_offfer == 0 ? 'No Discount' : 'have '}}</td>
                        <td>{{$product->finally_price}}</td>
                        <td>
                            <img src="{{ asset('storage/images/products/' . $product->image) }}" style="width: 150px;height:120px" alt="">
                        </td>

                        <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Basic example">

                                    <a href="{{ route('edit.product',$product->id)}}" type="button" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('destroy.product',$product->id)}}"   type="button" onclick="return confirm('Delete?')"
                                        class="deleteRecord btn btn-danger">Delete</a>
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
            ajax: "{{ Route('product.all') }}",
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
                    data: 'category_id',
                    name: 'category_id'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'have_offfer',
                    name: 'have_offfer'
                },
                {
                    data: 'offer_type',
                    name: 'offer_type'
                },
                {
                    data: 'offer_value',
                    name: 'offer_value'
                },
                {
                    data: 'finally_price',
                    name: 'finally_price'
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

            var data_id = $(this).attr('product_id')
            // alert(data_id);

            if (confirm("Are you sure you want to delete this item?")) {
                $.ajax({
                    type: "POST",
                    url: "{{route('destroy.product')}}",
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
