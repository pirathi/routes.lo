@extends('layouts.app')
{{-- {{ uc$district->districts_name }}--}}
@section('content')
<?php  $dist = request()->segment(1);  $cat = request()->segment(2); ?>
{{-- {{ $cat  }} --}}
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
    <div class="container">
        <div class="row">
            @foreach ($lists as $list)
                <div class="col-sm-4 mb-2">
                    <div class="card list_card border-success">
                        <div class="card-header ">
                          {{ $list->name }}
                          <span class="float-right">{{ $list->area }}</span>
                        </div>
                        <div class="card-body">
                            {{-- <div class="float-right">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3933.177184228032!2d80.01070521479151!3d9.665897293080727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afe56aa124547ad%3A0xd9c3a31a9a8705aa!2s476%20Hospital%20Rd%2C%20Jaffna!5e0!3m2!1sen!2slk!4v1608828014233!5m2!1sen!2slk" width="150" height="90" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div> --}}
                          <div><span class="fas fa-map-marker-alt"></span> {{ $list->address }}</div>
                          @if (!empty($list->phone))
                              <div><span class="fas fa-phone-square-alt"></span> {{ $list->phone }}</div>
                          @endif
                          @if (!empty($list->email))
                                <div><span class="fas fa-envelope"></span> {{ $list->email }}</div>
                          @endif
                          
                          @if (!empty($list->website))
                            <div><span class="fas fa-globe-asia"></span> {{ $list->website }}</div>
                          @endif
                          
                        </div>
                        <div class="card-footer bg-transparent border-success">
                            <a href=""><span class="fas fa-map-marked-alt"></span> Get Direction</a>
                            <a href=""><span class="float-right"><span class="fas fa-hand-point-right"></span> More Details</span></a>
                        </div>
                      </div>
                </div>
            @endforeach
            <div class="col-sm-12">
                <div class="float-right">
                    {{ $lists->links() }}
                </div>
                
            </div>
            
        </div>
    </div>
@endsection