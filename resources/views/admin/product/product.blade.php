@extends('admin/layouts/master')

@section('title')
product
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
                        <th class="border-bottom-0">category ID</th>
                        <th class="border-bottom-0">Price</th>
                        <th class="border-bottom-0">Discount</th>
                        <th class="border-bottom-0">finally price</th>
                        <th class="border-bottom-0">Photo</th>
                        <th class="border-bottom-0">operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0 ?>
                     @foreach ($products as $product)

                        <?php $i++ ?>
                        <tr>
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




                    </tr>

                    @endforeach
                </tbody>
            </table>
    </div>
</div>


@endsection
@section('js')


{{-- <script>
$(document).on('click','.deleteRecord',function(e){
    e.preventDefult();


    var data_id = $('.deleteRecord').atrr('data_id');


    $.ajax(
    {
        type:'Post',
        url:{{route('destroy.product')}},
        data: {
            "_token": "{{ csrf_token()}}",
            "id": data_id,
        },
        success: function (data){


            console.log("it Works");
        }
    });

});

</script> --}}


{{-- <script>
    $(document).ready(function(){

        $('#table_id4').dataTable({
            processing:true,
        });
    });
</script> --}}

@endsection
