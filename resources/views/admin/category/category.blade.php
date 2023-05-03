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
                        <tr>
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




                    </tr>

                    @endforeach
                </tbody>
            </table>
    </div>
</div>

@endsection


@section('js')
{{-- <script>
    $(document).ready(function(){

        $('#table_id2').dataTable({
            processing:true,
        });
    });
</script> --}}

@endsection
