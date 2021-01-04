@extends('layouts.app')
{{-- {{ uc$district->districts_name }}--}}
@section('content')
    <section class="search-sec">
        <div class="container">
            {{-- <form action="#" method="post" novalidate="novalidate">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <input type="text" class="form-control search-slt" placeholder="Enter Pickup City">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <input type="text" class="form-control search-slt" placeholder="Enter Drop City">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option>Select Vehicle</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <button type="button" class="btn btn-danger wrn-btn">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form> --}}
            {!! Form::open(['route' =>'homesearch' ,'class' => 'form-horizontal','method'=>'post','files'=>true]) !!}
                <div class="row">
                    <div class="col-lg-12">
                        <div id="error0"></div>
                        <div class="row">
                            <div class="col-lg-5 col-md-4 col-sm-12 p-0">
                                {!! Form::text('h_search_word', null, ['class' => 'form-control search-slt', 'id' => 'h_search_word', 'placeholder'=>'What...?', 'required' => 'required']) !!}
                                <div><span id="error-name"></span></div>
                            </div>
                            <div class="col-lg-5 col-md-4 col-sm-12 p-0">
                                {!! Form::select('h_district', $districts_drop, null, ['class' => 'form-control search-slt',  'id' => 'district', 'placeholder'=>'Select district', 'required' => 'required']) !!}
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
        <div class="container ">
            <div class="row content-box">
                <div class="col-xl-12 box-title">
                    <div class="inner">
                        <h2>
                            <span class="title-3">Browse by District in <span style="font-weight: bold;">Srilanka</span></span>
                        </h2>
                    </div>
                </div>
                @foreach ($districts as $district)
                    <div class="col-sm-3 h_district hover-zoom">
                        <a href="{{ route('category', $district->districts_name) }} "><i class="fas fa-map-marker-alt"></i> {{ ucfirst($district->districts_name) }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    {{-- <script>
        function validateForm(){
            var wrd = document.forms["h_search"]["h_search_word"].value;
            var district = document.forms["h_search"]["district"].value;
            
        
            if (wrd.length<1) {
                $('#errors0').text('*Please enter a username*');
            }
            if (district.length<1) {
                document.getElementById('error-email').innerHTML = " Please Enter Your Email *";
            }
                
            if(wrd.length<1 || district.length<1){
                   return false;
            }            
        }

        $(function() {
            $('form[name="h_search"]').submit(function(e) {
                var username = $('form[name="h_search"] input[name="h_search_word"]').val();
                if ( username == '') {
                    e.preventDefault();
                    $('#errors').text('*Please enter a username*');
                }
            });
        });
        </script> --}}
@push('test-push')
    

<script>
    // $(document).ready(function(){
    //   $("#h_searchfrm").validate({
    //     // Specify validation rules
    //     rules: {
    //         h_search_word: {
    //             required: true
    //         },
    //         district: {
    //             required: true
    //         }
    //     },
    //     messages: {},
    //     errorElement : 'div',
      
    //   });
    // });
//     $(document).ready(function(){
//   $("#h_searchfrm").validate({
//     // Specify validation rules
//     rules: {
//         h_search_word: "required",
//         district: "required",
     
//     },
//     messages: {
//         h_search_word: {
//       required: "Please enter first name",
//      },      
//      district: {
//       required: "Please enter last name",
//      },     
     
//     },
  
//   });
// });
    </script>
  @endpush        
@endsection

