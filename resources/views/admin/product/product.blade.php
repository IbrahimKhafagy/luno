@extends('admin/layouts/master')

@section('title')
product
@endsection

@section('content')

<span class="fieldset-tile text-muted bg-body" > All Brands</span>
<div class="card">
    <div class="card-body">
            <table id="example1" class="table key-buttons text-md-nowrap"data-page-length='50'>
                <thead>
                    <tr>
                        <th class="border-bottom-0">#</th>
                        <th class="border-bottom-0">Title</th>
                        <th class="border-bottom-0">Description</th>
                        <th class="border-bottom-0">category ID</th>
                        <th class="border-bottom-0">Photo</th>
                        <th class="border-bottom-0">Price</th>
                        <th class="border-bottom-0">have offer</th>
                        <th class="border-bottom-0">finally price</th>

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
                        <td>{{$cat->category_id == null ? 'Main' : $cat->parent->name }}</td>
                        <td>
                            <img src="{{ asset('storage/images/produts/' . $cat->image) }}" style="width: 150px;height:120px" alt="">
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
