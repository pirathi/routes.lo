@extends('admin.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <a href="{{ route('category.create') }}" class="btn btn-primary mt-3">Create</a>
                <table class="table table-bordered table-striped mt-5" style="width: 100%;border:1px solid #ccc">
                    <thead>
                        <th>Category name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </thead>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td><span><a class="btn btn-xs btn-primary" href="{{ route('category.edit',$category->id) }}"><i class="fas fa-edit"></i></a>  </span> | <span>
                                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'category.destroy', $category->id ] ]) }}
                                    {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-xs btn-danger']) }}
                                {{ Form::close() }}</span>
                            </td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection