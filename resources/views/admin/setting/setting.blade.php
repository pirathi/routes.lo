@extends('admin.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ ('Application Setting') }}</div>
    
                    <div class="card-body">
                        {!! Form::open(['method' => 'post', 'class' => 'form', 'id' => 'categoryfrom', 'action' => 'Admin\SettingController@store', 'files'=> 'true']) !!}
                            @include('admin.setting.form');
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

