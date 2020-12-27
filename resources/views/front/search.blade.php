@extends('layouts.app')
{{-- {{ uc$district->districts_name }}--}}
@section('content')
<?php  $dist = request()->segment(1);  ?>

    <div class="container">
        <div class="row content-box">
            <div class="col-xl-12 box-title">
                {{ count($listings) }}
                {{ $listings }}
            </div>
        </div>
    </div>
@endsection