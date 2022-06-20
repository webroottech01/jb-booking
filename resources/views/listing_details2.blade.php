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
                                <img src=" {{ asset('imgs/' . $images->icon) }}" class="img-fluid" alt="amnts" />
                                <p>{{ $images['data']['name'] }}</p>
                                
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
                     <p>Not any rules there are</p>
                    @php } @endphp
                
                    <ul class="house-rules">
                        {{--{{ isset ($listing[hosting_rules][0]['hosting_rule'][0]) ? listing->hosting}}--}}
                        {{ isset($listing->hosting_rules[0]['hosting_rule']) ? $listing->hosting_rules[0]hosting_rule : '' }}
                    </ul>
                    <a href="#">Show all House Rules</a><br>
                    <button type="button" class="btn btn-outline-secondary">CONTACT HOST</button>
                </section>
            </div>
            <div class="col-md-4">
                <section class="request-card">
                    <div class="row justify-content-between">
                        <div class="col-md-5">
							<p class="date">sept 18 2020
                            </p>
						</div>
                        <div class="col-md-4">
							<ul>
								<li>CAD</li>
								<li><img src="{{ asset ('imgs/cad-flag.jpg') }}" class="img-fluid"/></li>
							</ul>
						</div>
                    </div>
                    <h4>{{$listing['data']['price_per_hour']}}</h4>
                    <p>
                        2 hours <br/>
                        10:00 AM - 12:00 PM
                    </p>
                    <a class="chngchk" href="#">Change date / Check availability</a>
                    <button type="button" class="btn btn-primary">REQUEST TO BOARDROOM</button>
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
                        <li><i class="fa fa-star"></i></li>
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
           <!--  <iframe
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
                    src="https://www.google.com/maps/embed/v1/place?q={{$listing->address->lat}},{{$listing->address->lng}}&key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg"
                allowfullscreen></iframe>

        </section>
        <section class="otherbrthishost py-5">
			<div class="row">
				<div class="col-md-8">
                    
                    <h4>Other Boardrooms From This Host</h4>
                    
                    @foreach ($other_boardrooms as $boardroom)
            <a href="{{'/api/listing_details/' . $boardroom->id }}">
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
                                      
                                    @foreach ($boardroom['data']['picture'] as $images)
                                    <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                        <img src="{{ asset('imgs/' . $images->picture_name) }}" />
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
                                <h5 class="card-title">{{$boardroom->name}}</h5>
                                <p class="card-text">{{$boardroom->price_per_hour}} &emsp; {{$boardroom->price_per_day}}</p>
                                <h5 class="card-title">{{$boardroom->address->formatted_address}}</h5>
                                
                                
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
@endsection

