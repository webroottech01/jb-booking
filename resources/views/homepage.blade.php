@extends('layouts.master')
@section('content')

    <!-- jQuery UI Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        let $ = jQuery;
        $(function() {
            $("#datepickerFrom").datepicker({
                numberOfMonths: 2
            }).on('click',function(e) {
                $('.diffboxes').hide();
            });
        });
		$(function() {
            $("#datepickerTo").datepicker({
                numberOfMonths: 2
            }).on('click',function(e) {
                $('.diffboxes').hide();
            });
			
        });
    </script>



    <style type="text/css">
        /* Set the size of the div element
                        that contains the map */
        #map {
            height: 400px;
            width: 400px;
        }

        h2 {
            color: #308d3e;
        }
    </style>

    <style>

ul.srchbar > li > input {
    width: 100%;
    background: #fff;
    border: none;
    border-radius: 5px;
    padding: 17px 10px 14px 22px;  
    line-height: 1.1; 
    color: #444444;
    font-family: 'Myriad Pro Bold';
    font-size: 18px;
    background-position: 5px 19px !important;     
}
ul.srchbar > li > input::placeholder {
    color: #444444 !important;
    font-family: 'Myriad Pro Bold' !important;
    font-size: 18px !important; 
}
div#ui-datepicker-div {
    z-index: 10 !important;
}

.banner-box .calendar-icon {
    background: url(../public/imgs/Calendar-Icon.png)no-repeat #fff scroll 5px;
}
.banner-box .location-icon {
    background: url(../public/imgs/Location-Icon.png)no-repeat #fff scroll 5px;
}
.banner-box .person-icon {
    background: url(../public/imgs/Person-Icon.png)no-repeat #fff scroll 5px;
}
.banner-box .price-icon { 
    background: url(../public/imgs/Price-Icon.png)no-repeat #fff scroll 5px; 
}
.banner-box .amenities-icon {
    background: url(../public/imgs/Amenities-Icon.png)no-repeat #fff scroll 5px;
}
.banner-box .selectbox > a {
    display: block;
    width: fit-content;
    margin: 0 auto;
    padding: 19px 38px 16px; 
    border: none;
    font-size: 15px;
    margin-top: 35px;
    font-family: 'Myriad Pro Bold';
}
.banner-box .amenities-boxes center a{
    display: block;
    width: fit-content;
    margin: 0 auto;
    padding: 19px 38px 16px; 
    border: none;
    font-size: 15px;
    margin-top: 35px;
    font-family: 'Myriad Pro Bold'; 
}
.banner-box .selectbox p { 
    font-family: 'Myriad Pro Regular';
    color: #444444;
    font-size: 18px;
}
.banner-box .selectbox input[type=range]{
    -webkit-appearance: none;
}

.banner-box .selectbox input[type=range]::-webkit-slider-runnable-track {
    width: 300px;
    height: 5px;
    background: #eee;  
    border: none;
    border-radius: 3px;   
}

.banner-box .selectbox input[type=range]::-webkit-slider-thumb {
    -webkit-appearance: none;
    border: none;
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background: #ff671d; 
    margin-top: -4px;
}
.banner-box .selectbox  input[type=range]:focus::-webkit-slider-runnable-track {
    background: #ccc;
} 
.banner-box .amenitie-box { 
    width: 30%;
    margin: 0 1.3% 10px;
} 
.banner-box .amenitie-box input {
    display: block;
    height: 0px;
}
.banner-box .amenitie-box.chngchkboxbg{
    background-color:#E2E2E2;
}   
.banner-box .amenities-boxes center a:hover {
    background: #ff671d;
    color: #000;
}
.banner-box .selectbox  input[type=range]::-moz-range-thumb{
    -webkit-appearance: none;
    border: none;
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background: #ff671d; 
    margin-top: -4px; 	
}
.rmcaprice input[type=range],
.selectbox.rmcap input[type=range]{
	padding-left:0; 
}
.banner-box .selectbox  input[type=range]::-moz-range-track {
    height: 5px;
    background: #eee;  
    border: none;
    border-radius: 3px; 
} 
@media only screen and (max-width: 768px) {
    .banner-box .amenities-boxes center a, 
    .banner-box .selectbox > a {
        padding: 11px 32px 9px;
        font-size: 14px;
    }
}

@media only screen and (max-width: 425px) {
    div#ui-datepicker-div {
        max-width: 94%;
        overflow-x: scroll;
        width: 100% !important;
        left: 3% !important;
    }
    .banner-box .amenitie-box {
        width: 46%;
    }
}
</style>

<script>

$(document).ready(function(){  
$('.amenitie-box input').change(function() {
        $(this).parent().toggleClass( "chngchkboxbg" ) 
});
  
});</script>

    {{-- <header class="menu-header">
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-md-6">
				<div class="site-logo">
					<img src="/booking/public/https://hostdev2.justboardrooms.com/booking/public/imgs/jbrlogo.png" class="img-fluid" alt="site-logo">
				</div>
			</div>
			<div class="col-md-6">
				<ul class="menulist">
					<li class="profileimg">
						<img src="/booking/public/imgs/avatar-icon.png" class="img-fluid" alt="site-logo">
					</li>
					<li class="menutoggle">
						<div class="dropdown dropdown-menu-end dropdown-menu-lg-start">
							<div class="dropbtn"><i class="fa fa-bars"></i></div>
							<div class="dropdown-content">
								<a href="#login" data-bs-toggle="modal" data-bs-target="#loginModalForm">Login</a>
								<div class="modal fade" id="loginModalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h2 class="modal-title" id="exampleModalLabel">Welcome to justboardrooms</h2>
												<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
											</div>
											<div class="modal-body">
												<form>
													<div class="mb-3">
														<label class="form-label">Email Address</label>
														<input type="text" class="form-control" id="username" name="username" placeholder="Username" />
													</div>
													<div class="mb-3">
														<label class="form-label">Password</label>
														<input type="password" class="form-control" id="password" name="password" placeholder="Password" />
													</div>
													<div class="mb-3 form-check">
														<input type="checkbox" class="form-check-input" id="rememberMe" />
														<label class="form-check-label" for="rememberMe">Remember me</label>
													</div>
													<div class="modal-footer d-block">
														<p class="float-left">Not yet account <a href="#">Sign Up</a></p>
														<button type="submit" class="btn float-right">Submit</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<a href="#signup">Sign Up</a>
								<!-- <div class="modal fade" id="signModalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
									<!-- <div class="modal-dialog"> -->
										<!-- <div class="modal-content"> -->
											<!-- <div class="modal-header"> -->
												<!-- <h2 class="modal-title" id="exampleModalLabel">Welcome to justboardrooms</h2> -->
												<!-- <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button> -->
											<!-- </div> -->
											<!-- <div class="modal-body"> -->
												<!-- <form> -->
													<!-- <div class="mb-3"> -->
														<!-- <label class="form-label">Email Address</label> -->
														<!-- <input type="text" class="form-control" id="username" name="username" placeholder="Username" /> -->
													<!-- </div> -->
													<!-- <div class="mb-3"> -->
														<!-- <label class="form-label">Password</label> -->
														<!-- <input type="password" class="form-control" id="password" name="password" placeholder="Password" /> -->
													<!-- </div> -->
													<!-- <div class="mb-3 form-check"> -->
														<!-- <input type="checkbox" class="form-check-input" id="rememberMe" /> -->
														<!-- <label class="form-check-label" for="rememberMe">Remember me</label> -->
													<!-- </div> -->
													<!-- <div class="modal-footer d-block"> -->
														<!-- <p class="float-left">Not yet account <a href="#">Sign Up</a></p> -->
														<!-- <button type="submit" class="btn float-right">Submit</button> -->
													<!-- </div> -->
												<!-- </form> -->
											<!-- </div> -->
										<!-- </div> -->
									<!-- </div> -->
								<!-- </div> -->
								<hr>
								<a href="#">List my boardroom</a>
								<a href="#">Help Center</a>
							</div>
							<div class="dropdown-content d-none">
								<a href="#">Dashboard</a>
								<a href="#">Messages</a>
								<a href="#">Saved</a>
								<hr>
								<a href="#">Account</a>
								<a href="#">Settings</a>
								<a href="#">List my boardroom</a>
								<hr>
								<a href="#">Help Centre</a>
								<a href="#">Log out</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header> --}}
    <div class="homebanner position-relative">
        <img src="{{asset('imgs/home-banner.jpg')}}" class="img-fluid bannerimg" alt="site-banner">
        <div class="banner-box">
            <form action="{{ route('search-listings') }}" method="get">
                @csrf
                <div class="opacitybox px-3">
                    <h2>Meetings<span class="orngdot">.</span><br> When and where you want them<span
                            class="orngdot">.</span></h2>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 position-relative">
                            <input type="text" id="datepickerFrom" name="datepickerFrom" class="form-control calendar-icon"
                                placeholder="When is your meeting?*">
                        </div>

                         <div class="col-md-6 col-sm-6 position-relative">
                             <input 
                                class="form-control location-icon" 
                                name="ListingLocation" 
                                id="location-search" 
                                type="text"
                                placeholder="Vancouver"
                                list="autocompleteOff"
                                value="Vancouver, BC, Canada"
                                autocomplete="off"
                            >
                        </div> 

                        {{-- <div class="col-md-6 position-relative">
                        <input type="time" id="check_in" class="form-control calendar-icon" placeholder="Check_In Time?*">
                    </div>

                    <div class="col-md-6 position-relative">
                        <input type="time" id="check_out" class="form-control calendar-icon" placeholder="Check_Out Time?*">
                    </div> --}}


                    </div>
                    {{-- {{dd($listing)}} --}}

                    <div class="row position-relative pb-3">
                        <div class="col-md-4 col-sm-4">
                            <input onclick="showDiv('room-capacity')" class="form-control person-icon" id="room-capacity"
                                type="text" placeholder="Room Capacity" readonly>
                                
                            {{-- <select class="form-control person-icon" id="room-capacity" type="text" >
						<option value="">Select</option>
						@foreach ($listing['data'] as $roomCapacities)
							<option value="{{ $roomCapacities['description'] }}" >
								{{ $roomCapacities['listing_capacity']['description']}} 
							</option>
						@endforeach    
					    </select> --}}

                            <div class="selectbox rmcap diffboxes"  style="width:60%;">
                                <!--<p>Select number of attendees</p>
                                <p class="addsub">1 <i class="fa fa-minus" aria-hidden="true"></i> 30 <i
                                        class="fa fa-plus" aria-hidden="true"></i></p>
                                <br>-->
                                <p>
                                <label for="amount">Select number of attendees:</label>
                                <input type="text" id="roomCapacity" readonly style="border:0; color:#f6931f; font-weight:bold;text-align: center;">
                                </p>
                                <div id="room-slider-range"></div>
                               <!-- <input type="range" min="0" max="30" id="roomCapacity" oninput="setSelectedGuestNumber(false)" onchange="setSelectedGuestNumber(false)">-->
                                <a onclick="setSelectedGuestNumber()">Done</a>
                            </div>
                        </div>

                        {{-- {{dd($listing['data'][0]['price_per_hour'])}} --}}
                        <div class="col-md-4 col-sm-4">
                            <input onfocus="showDiv('price-range')" type="text" id="price-range"
                                class="form-control price-icon" placeholder="Hourly Rate">

                            <div class="selectbox rmcaprice diffboxes" style="display: none;">

                                    <p>
                                        <label for="amount">Select Price range:</label>
                                        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;text-align: center;">
                                        </p>
                                        
                                        <div id="slider-range"></div>
                                    <!-- <div>
                                        <input type="range" name="price" min="0" max="400" id="priceRange" oninput="setSelectedPrice(false)" onchange="setSelectedPrice(false)">
                                    </div> -->
                                    <a class="btn btn-primary" onclick="setSelectedPrice()">Done</a>
                                
                                    <!--<p>Select Price range <br>
                                        $0 - $400
                                    </p>-->
                                    {{-- <p class="addsub">$0 <i class="fa fa-minus" aria-hidden="true"></i> $200 <i
                                        class="fa fa-plus" aria-hidden="true"></i></p>
                                        <div class="prgrsbar"></div> --}}
                                <!-- <div><input type="range" min="0" max="400" id="priceRange" oninput="setSelectedPrice(false)" onchange="setSelectedPrice(false)">
                                </div> --> 
                            </div>
                            {{-- <select class="form-control price-icon" id="search-price" type="text" > 
						<option value="">Select price range</option>
						@foreach ($listing['data'] as $price)
							<option value="{{ $price['price_per_hour'] }}"> 
								{{ $price['price_per_hour']}} 
							</option>
						@endforeach --}}
                            </select>
                        </div>


                        <div class="col-md-4 col-sm-4">
                            <input onfocus="showDiv('search-amenities')" class="form-control amenities-icon"
                                id="search-amenities" type="text" placeholder="Amenities">
                            <div class="amenities-boxes diffboxes">
                        <h6 class="mb-3">Building</h6>
                            <label class="amenitie-box">
                                        <img src="{{ url('imgs/Accessibleimg.png')}}" class="img-fluid" alt="amnts">
                                        <p>Accessibility</p> 
                            
                            <input type="checkbox" name="" value="1" class="ammenties">
                            
                            </label>
                            
                            <label class="amenitie-box"><img src="{{ url('imgs/Air Conditioningimg.png')}}" class="img-fluid" alt="amnts">
                                        <p>Air Conditioning</p> 
                                        <input type="checkbox" name="" value="2" class="ammenties">
                                        
                                        </label>
                            <label class="amenitie-box">
                                        <img src="{{ url('imgs/Breakout.png')}}" class="img-fluid" alt="amnts">
                                        <p>Breakout</p>
                                        
                            <input type="checkbox" name="" value="3" class="ammenties">
                            
                            </label>
                            
                            
                            
                            <label class="amenitie-box">
                                        <img src="{{ url('imgs/Parking.png')}}" class="img-fluid" alt="amnts">
                                        <p>Parking</p>
                                        <input type="checkbox" name="" value="4" class="ammenties">
                            </label>
                            
                            <label class="amenitie-box">
                                        <img src="{{ url('imgs/Reception.png')}}" class="img-fluid" alt="amnts">
                                        <p>Reception</p>
                                        
                            <input type="checkbox" name="" value="5" class="ammenties">
                            </label>
                            


                            
                            <label class="amenitie-box">
                                        <img src="{{ url('imgs/Washroom-icon.png')}}" class="img-fluid" alt="amnts">
                                        <p>Washroom</p>
                                        
                                    <input type="checkbox" name="" value="8" class="ammenties">
                            </label>
                            <label class="amenitie-box">
                                        <img src="{{ url('imgs/whiteboard@3x.png')}}" class="img-fluid" alt="amnts">
                                        <p>Whiteboard</p>
                                        <input type="checkbox" name="" value="9" class="ammenties">
                            </label>
                            <label class="amenitie-box">
                                        <img src="{{ url('imgs/water@3x.png')}}" class="img-fluid" alt="amnts">
                                        <p>Water</p>
                                        <input type="checkbox" name="" value="12" class="ammenties">
                            </label>
                            <label class="amenitie-box" for="">
                                                                
                                        <img src="{{ url('imgs/tea-coffee@3x.png')}}" class="img-fluid" alt="amnts">
                                        <p>Tea/Coffee</p>   
                            
                            
                            <input type="checkbox" name="" value="13" class="ammenties">
                            </label>                            
                            
                            <h6 class="mb-3">Technology</h6>
                            
                            <label class="amenitie-box">
                                        <img src="{{ url('imgs/Icon-Gray-Wifi.png')}}" class="img-fluid" alt="amnts">
                                        <p>Wifi</p>
                                        <input type="checkbox" name="" value="10" class="ammenties">
                            </label>
                            <label class="amenitie-box">
                                        <img src="{{ url('imgs/projector@3x.png')}}" class="img-fluid" alt="amnts">
                                        <p>Projector</p>
                                        <input type="checkbox" name="" value="11" class="ammenties">
                            </label>

                            <label class="amenitie-box">
                                        <img src="{{ url('imgs/Teleconference.png')}}" class="img-fluid" alt="amnts">
                                        <p>Teleconference</p>
                                        <input type="checkbox" name="" value="6" class="ammenties">
                            </label>                            
                             <label class="amenitie-box">
                                        <img src="{{ url('imgs/Icon-Gray-TV.png')}}" class="img-fluid" alt="amnts">
                                        <p>Flatscreen TV</p>
                                        <input type="checkbox" name="" value="7" class="ammenties">
                            </label>
                            <center><a class="btn btn-primary" onclick="getAmentiesCount()">Done</a></center>
                        </div>
                        </div>
                    </div>

                </div>

                <input type="hidden" id="ListingCapacity" name="ListingCapacity">
                <input type="hidden" id="ListingPriceRange" name="ListingPriceRange">
                <input type="hidden" id="ListingAmenities" name="ListingAmenities">

                <p class="required ms-3">*Required</p>
                <button class="btn me-3" type="submit"><i class="fa fa-search"></i>Find My
                    Boardroom</button>
            </form>

        </div>
    </div>
    <section class="njbrhome py-5" id="listing-section">

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        function getlisting() {

            var filter = $('#filter').val() ;
            
            $.ajax({
                type: 'post',
                // url: "https://hostdev2.justboardrooms.com/api/getlisting",
                url: '{{ route('getlisting') }}',

                data: {
                    _token: "{{ csrf_token() }}",
                    filter: filter

                },
                success: function(response) {
                    $("#listing-section").html(response);
                }
            });
        }




        /* function searchlisting() {
            var startDate = $('#datepickerFrom').val();
            var endDate = $('#datepickerTo').val();
            var locationSearch = $("#location-search").val();
            var roomCapacity = $("#room-capacity").val();
            var price = $("#search-price").val();
            var amenities = $("#search-amenities").val();
            var checkIn = $("#check_in").val();
            var checkOut = $("#check_out").val();


            $.ajax({
                type: 'post',
                url: @json(url('https://hostdev2.justboardrooms.com/api/getlisting')),
                data: {
                    startDate: startDate,
                    endDate: endDate,
                    location: locationSearch,
                    roomCapacity: roomCapacity,
                    price: price,
                    amenities: amenities,
                    checkIn: checkIn,
                    checkOut: checkOut
                },
                success: function(response) {
                    $("#listing-section").html(response);
                }
            });
        } */




        function showDiv(id) {
            $('.diffboxes').hide();
            if (id == 'room-capacity') {
                $('.rmcap').show();
            }

            if (id == 'price-range') {
                $('.rmcaprice').show();
            }

            if (id == 'search-amenities') {
                $('.amenities-boxes').show();
            }
        }

        /* function hideDiv(id) {
            // console.log(id);
            if (id == 'room-capacity') {
                $('.rmcap').hide();
            }

            if (id == 'price-range') {
                $('.rmcaprice').hide();
            }

            if (id == 'search-amenities') {
                $('.amenities-boxes').hide();
            }
        } */

        var selectedValue = [];
        var GuestNumber = [];
        var PriceRange = [];

        $(function(){
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 350,
                values: [ 0, 200 ],
                slide: function( event, ui ) {
                    $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                }
            });
            $("#amount" ).val("$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
        });

        function setSelectedPrice(hideIt = true) {
            var selectedpricerange = $( "#amount" ).val();
            var avoid = "$";
            var priceArr = selectedpricerange.split("-");
            // console.log(priceArr);
            PriceRange.length = 0; 
            // $("#price-range").val($('#priceRange').val());
            $("#price-range").val($( "#amount" ).val());

            const PriceRangeMin = priceArr[0];//$('#priceRange').attr('min');
            const PriceRangeMax = priceArr[1];//$('#priceRange').val();
            var PriceRangeMineplace = PriceRangeMin.replace(avoid, '');
            var PriceRangeMaxeplace = PriceRangeMax.replace(avoid, '');
            // alert(strreplace);
            PriceRange = [PriceRangeMineplace, PriceRangeMaxeplace];
            //  alert(PriceRange);
            $('#ListingPriceRange').val(PriceRange);
            $("#listing-price-range").val(PriceRange); 
            // setTimeout(function() { 
            //     searchlisting();
            // }, 500);

            if(hideIt == true){
                $('.rmcaprice').hide();
            }

        }
        
        /* function setSelectedPrice(hideIt = true) {
            PriceRange.length = 0;
            $("#price-range").val($('#priceRange').val());

            const PriceRangeMin = $('#priceRange').attr('min');
            const PriceRangeMax = $('#priceRange').val();
            PriceRange = [PriceRangeMin, PriceRangeMax];
            
            $('#ListingPriceRange').val(PriceRange);

            if(hideIt == true){
                $('.rmcaprice').hide();
            }

        }
        */

        $(function(){
            $( "#room-slider-range" ).slider({
                range: true,
                min: 1,
                max: 30,
                values: [ 0, 30 ],
                slide: function( event, ui ) {
                    $( "#roomCapacity" ).val( ui.values[ 0 ] + " -" + ui.values[ 1 ] );
                }
            });
            $("#roomCapacity" ).val($( "#room-slider-range" ).slider( "values", 0 ) + " -" +  $( "#room-slider-range" ).slider( "values", 1 ) );
        });

        function setSelectedGuestNumber(hideIt = true) {
            GuestNumber.length = 0;
            // $("#room-capacity").val($('#roomCapacity').val());

            // const GuestNumberMin = $('#roomCapacity').attr('min');
            // const GuestNumberMax = $('#roomCapacity').val();
            // GuestNumber = [GuestNumberMin, GuestNumberMax];

            // $('#ListingCapacity').val(GuestNumber);
            $("#room-capacity").val($('#roomCapacity').val());
            var roomCapty = $('#roomCapacity').val();
            var roomCaptyArr = roomCapty.split("-");
            // console.log(roomCaptyArr);
            // const GuestNumberMin = $('#roomCapacity').attr('min');
            // const GuestNumberMax = $('#roomCapacity').val();
            var GuestNumberMin = roomCaptyArr[0];
            var GuestNumberMax = roomCaptyArr[1];
            GuestNumber = [GuestNumberMin, GuestNumberMax];
            $('#ListingCapacity').val(GuestNumber);
            $("#listing-room-capacity").val(GuestNumber);
            if(hideIt == true){
                $('.rmcap').hide();
            }

        }

        function getAmentiesCount() {
            /*   $("#room-capacity").val($('#roomCapacity').val());
              $('.rmcap').hide(); */

            // var selectedAmenities = $('.ammenties').find(":checked").val();
            // alert(selectedAmenities);
            selectedValue.length = 0;
            $('.ammenties:checked').each(function() {
                selectedValue.push($(this).val());
            });

            $('#search-amenities').val(selectedValue.length + ' Amenities')
            
            
            $('#ListingAmenities').val(selectedValue);

            $('.amenities-boxes').hide();

        }



        $(document).ready(function() {
            getlisting();
        });


       
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg&libraries=places"></script>
    <script>
        google.maps.event.addDomListener(window, 'load', initialize);
        function initialize() {
            var input = document.getElementById('location-search');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
            });
        }

</script>
    

@endsection
