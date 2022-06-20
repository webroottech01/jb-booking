
@extends('layouts.master')
@section('content')
{{--{{$listing->listing_amenities->name}}--}}
{{-- {{ $listing->listing_capacities->description }}--}}
{{--{{dd($listing->name)}}--}}

{{-- {{dd($listing->pictures[0]->picture_name)}}  --}}
{{--{{ dd($listing->hosting_rules[0]->hosting_rule) }} --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<section class="brslider position-relative">
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>
         
       
        @foreach ($listing['data'] as $images)

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('imgs/' . $images['listing_gallery'][0]['picture_name'])}}" alt="brbanner" class="d-block w-100" />
            </div>
            <div class="carousel-item">
                <img src="{{ asset('imgs/' . $images['listing_gallery'][0]['picture_name'])  }}" alt="brbanner" class="d-block w-100" />
            </div>
            <div class="carousel-item">
                <img src="{{ asset('imgs/' . $images['listing_gallery'][0]['picture_name']) }}" alt="brbanner" class="d-block w-100" />
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    @endforeach
    {{--{{dd($listing)}}--}}
    <a class="request-to-book">THIS IS A <span class="text-white">REQUEST TO BOOK</span> BOARDROOM <i class="fa fa-question"></i></a>
</section>



<section class="brdetailmain pt-3 pb-5">
    <div class="container">
        <p class="gotosrchrslt"><i class="fa fa-angle-left"></i><a href="#srch-result">Search Results</a></p>
        <div class="row justify-content-between">
            <div class="col-md-7">
                <section class="address position-relative py-3">
                    <a class="likes" href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                    
                    <h4>{{ $listing['data'][0]['name'] }}</h4>
                    <ul class="fivestars m-0 p-0">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li class="starcounting">121</li>
                    </ul>
                    <p class="locnm mt-3">
                
                    {{ $listing['data'][0]['address']['formatted_address'] }}<br />
                   
                    </p>
                    <p class="locnm">Boardroom name: <b>{{ $listing['data'][0]['name'] }}</b></p>
                    <p>
                        <b>Room capacity:</b>{{ $listing['data'][0]['listing_capacity']['description'] }}<br />
                        <b>Minimum booking duration:</b> {{ $listing['data'][0]['min_hour'] }}
                    </p>
                    <p>
                    {{ $listing['data'][0]['description']}}
                
                       <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et nunc tristique, ornare enim ut, sagittis libero. Duis ac libero velit. Aliquam vitae hendrerit tortor, sit amet dapibus nisi. Vestibulum nulla
                        ante, vehicula vel turpis eu, congue ultricies nibh. Vestibulum eu purus augue. Nullam convallis quis ipsum vel pulvinar. In rhoncus diam sed efficitur iaculis. Integer et augue pretium, commodo sapien eu, ultricies
                        arcu. Praesent auctor metus dolor, in aliquet dui suscipit sed.-->
                    </p>
                </section>
              
                <section class="amenities-boxes detail-amen-box d-block position-relative pb-3">
                <h4>Amenities</h4>
                @php
                    if(count ($listing['data'][0]['listing_amenities']) == 0){ @endphp
                     <p>There is no amenities added</p>
                    @php } @endphp
                   
                    <div class="row mb-2">
                   
                    @foreach ($listing['data'][0]['listing_amenities'] as $images )
                        <div class="col-md-3">
                            <div class="amenitie-box">
                                <img src=" {{ asset('imgs/' . $images['icon']) }}" class="img-fluid" alt="amnts" />
                                <p>{{ $images['name'] }}</p>
                                
                            </div>
                        </div>
                       
                     @endforeach

                    </div>
                    
                </section>
               
                <section class="features pb-4">
                    <h4>Features</h4>
                    <ul class="features-list">
                   
                        <li>Aenean pharetra magna in rhoncus faucibus</li>
                        <li>Pellentesque sed rhoncus justo et sagittis mauris</li>
                        <li>Nullam convallis quis ipsum vel pulvinarn rhoncus diam</li>
                        <li>Pellentesque sed rhoncus justo, et sagittis mauris</li>
                    </ul>
                    <a href="#">Show all Features</a>
                </section>
                
                <section class="house-rules">
                    <h4>House Rules</h4>
                   
                    @php
                    if(count ($listing['data'][0]['hosting_rules']) == 0){ @endphp
                     <p>Not any rules there</p>
                    @php } @endphp
                
                    <ul class="house-rules">
                    {{--  {{ isset($listing['hosting_rules'][0]['hosting_rule']) ? $listing['hosting_rules'][0]hosting_rule : '' }} --}}
                    </ul>
                    <a href="#">Show all House Rules</a><br>
                    
     
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">
                        CONTACT HOST</button>
                </section>
            </div>
            <div class="col-md-4">
                <section class="request-card">
                    <div class="row justify-content-between">
                        <div class="col-md-5">
							<p class="date">  {{ Session::get('variableName');}}
                            </p>
						</div>
                        <div class="col-md-4">
							<ul>
								<li>CAD</li>
								<li><img src="{{ asset ('imgs/cad-flag.jpg') }}" class="img-fluid"/></li>
							</ul>
						</div>
                    </div>
                <form action="{{ url('/api/payment') }}" method="get">
                 <input type="hidden" value="{{$calculate_rate}}" name="calculate_rate" id="calculate_rate">
              
                 <h4>{{$calculate_rate}}</h4>
                    <!-- <h4>{{$listing['data'][0]['price_per_hour']}}</h4> 
                onclick="document.location='{{ url('/api/payment') }}'"-->
                    <p>
                        {{$hourdiff}} hours <br/>
                        {{ Session::get('time');}} - 
                        {{ Session::get('timeout');}}
                    </p>

                 

                    @php 
                   
                    if(($startDate == " ")) {  @endphp
                        <div class="col-md-6 position-relative">
					<input type="text" id="datepickerFrom" class="form-control calendar-icon" placeholder="Select Date*">
				    </div>

                    @php }else{ @endphp
                      
                        <a class="chngchk" href="#">Change date / Check availability</a>
                    
                        @php } @endphp
                 
                        <br>
                    <button type="submit" id="checkout"  class="btn btn-primary">REQUEST TO BOARDROOM</button>
                    </form>
                </section>
            </div>
        </div>
        <section class="reviews py-5 align-items-center">
            <div class="row mb-4">
                <div class="col-md-1">
                    <h4 class="mb-0">Reviews</h4>
                </div>
                <div class="col-md-2">
                    <ul class="fivestars m-0 p-0">
                        <!--li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li class="starcounting">121</li>
                    </ul>
                </div>
            </div>
            <p class="brbtm"><strong>Most Recent</strong><span> | &nbsp; Highest Rated</span></p>
            <div class="row py-3">
                <div class="col-md-5">
                    <div class="row justify-content-between">
                        <div class="col-md-3">
                            <p class="mb-0">Bruce</p>
                        </div>
                        <div class="col-md-3 text-end">
                            <p class="mb-0">Aug 7, 2020</p>
                        </div>
                    </div>
                    <ul class="fivestars m-0 p-0">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    <p><strong>Great space!</strong></p>
                    <p>Cras dignissim, ante non varius suscipit, urna libero condimentum sem, id convallis enim odio ut metus. Aliquam condimentum mi sem. Sed consequat porttitor nisl in ullamcorper.</p>
                </div>
                <div class="col-md-5">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            <p class="mb-0">Mark</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <p class="mb-0">Aug 2, 2020</p>
                        </div>
                    </div>
                    <ul class="fivestars m-0 p-0">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    <p><strong>Clean</strong></p>
                    <p>Cras dignissim, ante non varius suscipit, urna libero condimentum sem, id convallis enim odio ut metus. Aliquam condimentum mi sem. Sed consequat porttitor nisl in ullamcorper.</p>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-md-5">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            <p class="mb-0">Karen</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <p class="mb-0">Jul 29, 2020</p>
                        </div>
                    </div>
                    <ul class="fivestars m-0 p-0">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                    </ul>
                    <p><strong>Good communication</strong></p>
                    <p>Cras dignissim, ante non varius suscipit, urna libero condimentum sem, id convallis enim odio ut metus. Aliquam condimentum mi sem. Sed consequat porttitor nisl in ullamcorper.</p>
                </div>
                <div class="col-md-5">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            <p class="mb-0">Paul</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <p class="mb-0">Jul 27, 2020</p>
                        </div>
                    </div>
                    <ul class="fivestars m-0 p-0">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    <p><strong>Nice and private</strong></p>
                    <p>Cras dignissim, ante non varius suscipit, urna libero condimentum sem, id convallis enim odio ut metus. Aliquam condimentum mi sem. Sed consequat porttitor nisl in ullamcorper.</p>
                </div>
            </div>
            <a href="">Show all Reviews</a>
        </section>
        <section class="location">
            <h4>Location</h4>
            <iframe
                src="https://www.google.com/maps/embed/v1/place
                ?key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg
                &location=46.414382,10.013988"
                width="600"
                height="450"
                style="border: 0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                ></iframe> -->
                
                <iframe 
                    width="450"
                    height="250"
                    frameborder="0" style="border:0;"
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed/v1/place?q={{$listing['address'][0]['lat']}},{{$listing['address'][0]['lng']}}&key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg"
                allowfullscreen></iframe>

        </section>
        <section class="otherbrthishost py-5">
			<div class="row">
				<div class="col-md-8">
                    
                    <h4>Other Boardrooms From This Host</h4>
                   
                    @foreach ($other_boardrooms['data'] as $boardroom)
                   
            <a href="{{'/api/listing_details/' . $boardroom['id'] }}">
                <div class="cardslider">
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <div class="card position-relative">
                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                  <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                  </div>
                                  <div class="carousel-inner">
                                    @php $key = 0;@endphp 
                                    
                                    @foreach ($boardroom as $images)
                                 
                                    <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                        <img src="{{ asset('imgs/' . $boardroom['listing_gallery']['picture_name']) }}" />
                                    </div>
                                    @php $key++;@endphp 
                                    @endforeach
                                  </div>
                                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                  </button>
                                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                  </button>
                                </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$boardroom['name']}}</h5>
                                <p class="card-text">{{$boardroom['price_per_hour']}} &emsp; {{$boardroom['price_per_day']}}</p>
                                <h5 class="card-title">{{$boardroom['address']['formatted_address']}}</h5>
                                
                                
                                <ul class="fivestars m-0 p-0">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                              <a class="discavl">DISCOUNT AVAILABLE</a>						  
                              <a class="rdybook">READY TO BOOK</a>	
                              <a class="pprpln"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>&nbsp;1.1km</a>	
                              <a class="likes"><i class="fa fa-heart-o" aria-hidden="true"></i></a>				
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>
                </a>
                @endforeach
				<div class="col-md-4"></div>
			</div>
        </section>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
// $('#myModal').on('show.bs.modal', function (event) {
//   var button = $(event.relatedTarget) // Button that triggered the modal
//   var recipient = button.data('whatever') // Extract info from data-* attributes
//   // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
//   // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
//   var modal = $(this)
//   modal.find('.modal-title').text('New message to ' + recipient)
//   modal.find('.modal-body input').val(recipient)
// })
</script>


<!--script src="https://js.stripe.com/v3"></script>
<script>
    var stripe = Stripe("pk_test_51IgcyRLzBzBxz2hSXts52KO8lqADelOPrvYvjyKuoP8xDCDGOIJKuqwhd7fRpnkJ7lBaU1i1J6uXQtX2aoPboVEo00wgqROmnq");
    document.getElementById("checkout").addEventListener("click",function(){
      //  alert("hi");

      var paymentElement = session.create('payment', {
       // stripe.redirectToCheckout({
            lineItems:[
                {
                    price : "200",
                    quanity : 2,
                },
            ],
            mode: "payment",
            successUrl: "'http://localhost:4242/success.html",
            cancelUrl: "http://localhost:4242/cancel.html",
        })
        .then(function(session){
            return stripe.redirectToCheckout({ sessionId: session.id });
            //console.log(result);
        });
    })
   
    </script-->
    
@endsection



