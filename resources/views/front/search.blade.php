@extends('layouts.app')
{{-- {{ uc$district->districts_name }}--}}
@section('content')
<?php  $dist = request()->segment(1);   $cat = request()->segment(2); ?>

<section class="search-sec">
    <div class="container">
       {!! Form::open(['method' => 'post', 'class' => 'form', 'action' => 'Front\SearchController@index']) !!}
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-4 col-sm-12 p-0">
                            {!! Form::text('category', ucfirst($cat), ['class' => 'form-control search-slt']) !!}
                        </div>
                        <div class="col-lg-5 col-md-4 col-sm-12 p-0">
                            {!! Form::text('city', null, ['class' => 'form-control search-slt', 'placeholder'=>'Type your City in '.ucfirst($dist).'...?']) !!}
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-12 p-0">
                            {{ Form::button('serach', ['type' => 'submit', 'class' => 'btn btn-primary wrn-btn']) }}
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</section>
<section>
    <div class="container">
        <div class="row content-box">
            <div class="col-xl-12 box-title">
                {{ count($listings) }}
                {{ $listings }}
            </div>
        </div>
    </div>
</section>
    
@endsection