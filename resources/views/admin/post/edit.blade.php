@extends('admin.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ ('Edit Post') }}</div>
    
                    <div class="card-body">
                        {!! Form::model($post, ['method' => 'PATCH', 'class' => 'form', 'route' => ['post.update', $post->id]]) !!}
                            @include('admin.post.form');
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection