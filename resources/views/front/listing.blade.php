@extends('layouts.app')
{{-- {{ uc$district->districts_name }}--}}
@section('content')
<?php  $dist = request()->segment(1);  $cat = request()->segment(2); ?>
{{-- {{ $cat  }} --}}
<section class="search-sec">
    <div class="container">
       {!! Form::open(['route' =>'homesearch','method' => 'post', 'class' => 'form']) !!}
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-4 col-sm-12 p-0">
                            {!! Form::text('l_search', ucfirst($cat), ['class' => 'form-control search-slt']) !!}
                        </div>
                        <div class="col-lg-5 col-md-4 col-sm-12 p-0">
                            {!! Form::text('l_city', null, ['class' => 'form-control search-slt', 'placeholder'=>'Type your City in '.ucfirst($dist).'...?']) !!}
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-12 p-0">
                            {{ Form::button('serach', ['type' => 'submit', 'class' => 'btn btn-primary wrn-btn']) }}
                            {!! Form::hidden('districthid', $dist, ['class' => 'form-control search-slt', 'placeholder'=>'City...?']) !!}
                            {!! Form::hidden('l_category', $cat, ['class' => 'form-control search-slt', 'placeholder'=>'City...?']) !!}
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
                          <?php $area = \App\Models\Area::find($list->area ); ?>
                          <span class="float-right">{{ $area->area_name }}</span>
                        </div>
                        <div class="card-body">
                            <div id="social-links" class="float-right">
                                <ul>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button " id=""><i class="fab fa-facebook fa-2x"></i></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url=http://jorenvanhocht.be" class="social-button " id=""><i class="fab fa-twitter fa-2x"></i></a></li>
                                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://jorenvanhocht.be&amp;title=my share text&amp;summary=dit is de linkedin summary" class="social-button " id=""><i class="fab fa-linkedin fa-2x"></i></a></li>
                                    <li><a href="https://wa.me/?text=http://jorenvanhocht.be" class="social-button " id=""><i class="fab fa-whatsapp fa-2x"></i></a></li>    
                                </ul>
                            </div>
                            @if ($list->longitude)
                                <div><span class="fas fa-map-marker-alt"></span> <a target="_blank" href="https://www.google.com/maps/place/{{ $list->latitude }},{{ $list->longitude  }}">{{ $list->address }}</a></div>
                            @else 
                                <div><span class="fas fa-map-marker-alt"></span>{{ $list->address }}</div>
                            @endif
                          
                            @if (!empty($list->phone) && ($list->phone != 'null'))
                                <div><span class="fas fa-phone-square-alt"></span> <?php echo preg_replace( '#([^,\s]+)#is', '<a href="tel:$1">$1</a>', $list->phone);  ?></div>
                            @endif
                            @if (!empty($list->email) && ($list->email != 'null'))
                                <div><span class="fas fa-envelope"></span> {{ $list->email }}</div>
                            @endif
                            
                            @if (!empty($list->website) && ($list->website != 'null'))
                                <div><span class="fas fa-globe-asia"></span> <a href="//{{ $list->website }}" target="_blank">{{ $list->website }}</a></div>
                            @endif
                        </div>
                        <div class="card-footer border-success">
                            @if ($list->latitude)
                                <a target="_blank"  href="https://www.google.com/maps/dir/{{ $list->latitude }},{{ $list->longitude  }}"><span class="fas fa-map-marked-alt"></span> Get Direction</a>
                            @endif
                            <a id="moreDetails" data-id = '{{ $list->id }}' href="{{ route('description', [$dist, $cat,$list->id, $list->slug]) }}"><span class="float-right"><span class="fas fa-hand-point-right"></span> More Details</span></a>
                        </div>
                    </div>
                    {{-- <form action="{{ route('description', [$dist, $cat, $list->slug]) }}" method="get">
                        <input type="hidden" value="{{ $list->id }}" name="id">
                        <button type="submit">More Details</button>
                    </form> --}}
                    {{-- {!! Form::open(['route' = '(description, [$dist, $cat, $list->slug])' ,'method' => 'post', 'class' => 'form' ,'id' => 'det']) !!} --}}
                {{-- {!! Form::open(['method' => 'post', 'class' => 'form' ,'id' => 'det']) !!}
                    {!! Form::hidden('id', $list->id, ['class' => 'form-control search-slt']) !!}
                    {!! Form::hidden('dis', $dist, ['class' => 'form-control search-slt']) !!}
                    {!! Form::hidden('cat', $cat, ['class' => 'form-control search-slt']) !!}
                {!! Form::close() !!} --}}
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