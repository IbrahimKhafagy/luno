@extends('admin/layouts/master')


@section('title')
Brands
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
<span class="fieldset-tile text-muted bg-body" > All Brands</span>

<div class="card">
    <div class="card-body">
            <table id="table_id" class="table key-buttons text-md-nowrap"data-page-length='50'>
                <thead>
                    <tr>
                        <th class="border-bottom-0">#</th>
                        <th class="border-bottom-0">Title</th>
                        <th class="border-bottom-0">Photo</th>
                        <th class="border-bottom-0">process</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i=0 ?>
                    @foreach ($brands as $x)

                        <?php $i++ ?>
                        <tr>
                        <td>{{$i}}</td>
                        <td>{{$x->name}}</td>
                        <td>
                            <img src="{{ asset('storage/images/brands/' . $x->image) }}" style="width: 150px;height:120px" alt="">
                        </td>

                        <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Basic example">

                                    <a href="{{ route('edit.brand',$x->id)}}" type="button" class="btn btn-warning">Edit</a>
                                    <a href="{{route('destroy.brand',$x->id)}}" type="button" onclick="return confirm('Delete?')"
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

        $('#table_id').datatable({
            processing:true,
        });
    });
</script> --}}

 

<script>
    $(document).ready(function(){

        $('#table_id').dataTable({
            processing:true,
        });
    });
</script>

@endsection
