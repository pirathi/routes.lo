@extends('layouts.app')
{{-- {{ uc$district->districts_name }}--}}
@section('content')
<?php  $dist = request()->segment(1);  ?>
<section class="search-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' =>'homesearch', 'method' => 'post', 'class' => 'form',]) !!}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-5 col-md-4 col-sm-12 p-0">
                                    {!! Form::text('c_search_word', null, ['class' => 'form-control search-slt', 'placeholder'=>'What...?','required' => 'required']) !!}
                                </div>
                                <div class="col-lg-5 col-md-4 col-sm-12 p-0">
                                    {!! Form::text('c_city', null, ['class' => 'form-control search-slt', 'placeholder'=>'Type your City in '.ucfirst($dist).'...?']) !!}
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-12 p-0">
                                    {{ Form::button('serach', ['type' => 'submit', 'class' => 'btn btn-primary wrn-btn']) }}
                                </div>
                                {!! Form::hidden('districthid', $dist, ['class' => 'form-control search-slt', 'placeholder'=>'City...?']) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
    <div class="container">
        <div class="row content-box">
            <div class="col-xl-12 box-title">
                <div class="inner">
                    <h2>
                        <span class="title-3">Browse by Category in <span style="font-weight: bold;">{{ $dist }}</span></span>
                    </h2>
                </div>
            </div>
            @foreach ($categories as $categorie)
                <div class="col-sm-3 cat_list">
                    <a href="{{ route('list', [$dist, $categorie->category_name]) }} "><i class="{{ $categorie->icon_class }}"></i> 
                        <h6>{{ ucfirst($categorie->category_name) }}</h6></a>
                </div>
            @endforeach
        </div>
    </div>
@endsection