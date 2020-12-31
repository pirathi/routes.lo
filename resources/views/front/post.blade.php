@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ ('Add your Business here for Free in Srilanka') }}</div>
    
                    <div class="card-body">
                        {!! Form::open(['method' => 'post', 'class' => 'form', 'route' => 'add_listing.store']) !!}
                        @include('front.form');
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop

    