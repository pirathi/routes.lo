@extends('layouts.app')
{{-- {{ uc$district->districts_name }}--}}
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">
                  <h3 class="card-title float-left">{{ $details->name }}</h3>
                </div>
                <div class="card-body">
                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7865.962029403661!2d80.026647423184!3d9.682661022276562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afe5413ad91303f%3A0xb8b9ee2f65602af8!2sPeople&#39;s%20Bank!5e0!3m2!1sen!2slk!4v1611330028139!5m2!1sen!2slk" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <hr>
                    <div class="mt-3">
                        @if ($details->longitude)
                            <div><span class="fas fa-map-marker-alt"></span> <a target="_blank" href="https://www.google.com/maps/place/{{ $details->latitude }},{{ $details->longitude  }}">{{ $details->address }}</a></div>
                        @else 
                            <div><span class="fas fa-map-marker-alt"></span>{{ $details->address }}</div>
                        @endif
                        
                        @if (!empty($details->phone) && ($details->phone != 'null'))
                            <div><span class="fas fa-phone-square-alt"></span> <?php echo preg_replace( '#([^,\s]+)#is', '<a href="tel:$1">$1</a>', $details->phone);  ?></div>
                        @endif
                        @if (!empty($details->email) && ($details->email != 'null'))
                            <div><span class="fas fa-envelope"></span> {{ $details->email }}</div>
                        @endif
                        
                        @if (!empty($details->website) && ($details->website != 'null'))
                            <div><span class="fas fa-globe-asia"></span> <a href="//{{ $details->website }}" target="_blank">{{ $details->website }}</a></div>
                        @endif
                    </div>
                    <div id="social-links" class="float-right">
                        <ul class="details">
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button " id=""><i class="fab fa-facebook fa-2x"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url=http://jorenvanhocht.be" class="social-button " id=""><i class="fab fa-twitter fa-2x"></i></a></li>
                            <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://jorenvanhocht.be&amp;title=my share text&amp;summary=dit is de linkedin summary" class="social-button " id=""><i class="fab fa-linkedin fa-2x"></i></a></li>
                            <li><a href="https://wa.me/?text=http://jorenvanhocht.be" class="social-button " id=""><i class="fab fa-whatsapp fa-2x"></i></a></li>    
                        </ul>
                    </div>
                    
                </div>
              </div>
        </div>
        <?php 
            $category = \App\Models\Category::find($details->category ); 
            $area = \App\Models\Area::find($details->area ); 
        ?>
        <div class="col-md-4">
            <div class="card mt-3">
                <div class="card-header">
                   <h5 class="card-title"> Related {{ ucfirst($category->category_name) }} near by {{ $area->area_name }}</h4>
                </div>
                <div class="card-body">
                    {{-- {{ $relatedlists  }} --}}
                    @foreach ($relatedlists as $list)
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $list->name }}</li>
                        </ul>
                        
                    @endforeach

                    <div class="float-right mt-3">
                        {{ $relatedlists->links() }}
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection