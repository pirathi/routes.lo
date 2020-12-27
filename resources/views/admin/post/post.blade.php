@extends('admin.index')
        <a href="{{ route('post.create') }}" class="btn btn-primary">Create</a>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route('post.create') }}" class="btn btn-primary mt-3">Create</a>
                <table class="table table-bordered table-striped mt-5" style="width: 100%;border:1px solid #ccc">
                    <thead>
                        <th>Name</th>
                        <th>Category</th>
                        <th>District</th>
                        <th>Area</th>
                        <th>Action</th>
                    </thead>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->category }}</td>
                            <td>{{ $post->district }}</td>
                            <td>{{ $post->area }}</td>
                            <td><span><a class="btn btn-xs btn-primary" href="{{ route('post.edit',$post->id) }}"><i class="fas fa-edit"></i></a>  </span> | <span>
                                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'post.destroy', $post->id ] ]) }}
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