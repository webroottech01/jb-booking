@extends('layouts.master')
@section('content')
    <div class="saved-boardrooms py-5 px-5">
        <div class="container">
            <h4 class="saved-header">Saved</h4>
            <div class="saved-body">
                <div class="showhidebtn py-5 text-end">
                    <a style="color:#ff671d;text-decoration:none;display:none;" id="show">Show</a>
                    <a style="color:#ff671d;text-decoration:none;display:block;" id="hide">Hide</a>
                </div>
                <div style="display: none;" class="hidecontent text-center">
                    <p>You have no saved boardrooms.</p>
                    <img src="imgs/faq-host.png" class="img-fluid" alt="find-boardroom" /> <br>
                    <a href="{{route('homepage')}}">FIND A BOARDROOM</a>
                </div>

                <div style="display: block;" class="showcontent">
                      <div class="cardslider flex-wrap row">
                    @foreach ($listings as $boardroom)
                        @for ($i = 0; $i < 8; $i++)
                        
                            <div class="col-md-3 mx-0 py-3">
                                <a style="text-decoration: none;"
                            href="{{ url('listing-details/' . $boardroom['id'] )}}">
                                <div class="card">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="0" class="active" aria-current="true"
                                                aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner" style="height: 10rem">

                                            @php $key = 0;@endphp

                                            @foreach ($boardroom['listing_gallery'] as $images)
                                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                    <img src='https://hostdev2.justboardrooms.com/Images/{{$images['picture_name']}}'>
                                                    
                                                </div>
                                                @php $key++;@endphp
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                       
                                        <a class="pprpln"><i class="fa fa-paper-plane-o"
                                                aria-hidden="true"></i>&nbsp;1.1km</a>
                                        <a id="likes" onclick="saveboardroom()" class="likes"><i
                                                class="fa fa-heart" aria-hidden="true"></i></a>

                                    </div>
                                    <div class="card-body" style="font-family: 'Myriad Pro Semibold';">
                                        <h5 class="card-title">{{ $boardroom['name'] }}</h5>
                                        <p class="card-text">${{ $boardroom['price_per_hour'] }}/Hr &emsp;
                                            ${{ $boardroom['price_per_day'] }}/Day</p>
                                        <h5 class="card-title">{{ $boardroom['address']['formatted_address'] }}
                                        </h5>


                                        <ul class="fivestars m-0 p-0">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                            </div>
                        
                        @endfor
                    @endforeach
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        $('#hide').on('click',function(){
            $('.hidecontent').show();
            $('#show').show();
            $('#hide').hide();
            $('.showcontent').hide();
        });

        $('#show').on('click',function(){
            $('.hidecontent').hide();
            $('#hide').show();
            $('#show').hide();
            $('.showcontent').show();
        });


    </script>
@endsection
