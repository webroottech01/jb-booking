<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
		<!-- Required meta tags -->
		   <!-- CSRF Token -->
		   <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

		<!-- Latest compiled JavaScript -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

		<!---CSS link --->
        <link rel="stylesheet" type="text/css" href="https://beta.justboardrooms.com/booking/public/css/nw-justboardrooms_style.css">
        <link rel="stylesheet" type="text/css" href="https://beta.justboardrooms.com/booking/public/css/custom.css">


		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/> -->

        <!-- favicon -->
        <link rel="icon" href="{{ asset('imgs/jbrfavicon.png') }}">

<style>

ul.srchbar > li > input {
    width: 100%;
    background: #fff;
    border: none;
    border-radius: 5px;
    padding: 15px 10px 15px 23px;  
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

.srchbar.banner-box .calendar-icon {
    background: url(../public/imgs/Calendar-Icon.png)no-repeat #fff;
}
.srchbar.banner-box .location-icon {
    background: url(../public/imgs/Location-Icon.png)no-repeat #fff;
}
.srchbar.banner-box .person-icon {
    background: url(../public/imgs/Person-Icon.png)no-repeat #fff;
}
.srchbar.banner-box .price-icon { 
    background: url(../public/imgs/Price-Icon.png)no-repeat #fff; 
}

.srchbar.banner-box .amenities-icon {
    background: url(../public/imgs/Amenities-Icon.png)no-repeat #fff;
}
.srchbar .selectbox > a {
    display: block;
    width: fit-content;
    margin: 0 auto;
    padding: 19px 38px 16px; 
    border: none;
    font-size: 15px;
    margin-top: 35px;
    font-family: 'Myriad Pro Bold';
}
.srchbar .amenities-boxes center a{
    display: block;
    width: fit-content;
    margin: 0 auto;
    padding: 19px 38px 16px; 
    border: none;
    font-size: 15px;
    margin-top: 35px;
    font-family: 'Myriad Pro Bold';	
}
.srchbar .selectbox p { 
    font-family: 'Myriad Pro Regular';
    color: #444444;
    font-size: 18px;
}
.srchbar .selectbox input[type=range]{
    -webkit-appearance: none;
	padding-left: 0;
}

.srchbar .selectbox input[type=range]::-webkit-slider-runnable-track {
    width: 300px;
    height: 5px;
    background: #eee;  
    border: none;
    border-radius: 3px;   
}
 
.srchbar .selectbox input[type=range]::-webkit-slider-thumb {
    -webkit-appearance: none;
    border: none;
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background: #ff671d; 
    margin-top: -4px;
}
.srchbar .selectbox  input[type=range]::-moz-range-thumb{
    -webkit-appearance: none;
    border: none;
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background: #ff671d; 
    margin-top: -4px; 	
}
.srchbar .selectbox  input[type=range]:focus::-webkit-slider-runnable-track {
    background: #ccc;
}
.srchbar .selectbox  input[type=range]::-moz-range-track {
    height: 5px;
    background: #eee;  
    border: none;
    border-radius: 3px; 
} 
.srchbar .amenitie-box { 
    width: 30%;
    margin: 0 1.3% 10px;
} 
.srchbar .amenitie-box input {
    display: block;
    height: 0px;
}
.srchbar .amenitie-box.chngchkboxbg{
	background-color:#E2E2E2;
}	
.srchbar .amenities-boxes center a:hover {
    background: #ff671d;
    color: #000;
}


@media only screen and (max-width: 425px) {
    div#ui-datepicker-div {
        max-width: 94%;
        overflow-x: scroll;
        width: 100% !important;
        left: 3% !important;
    }
    ul.srchbar > li > input {
        padding: 6px 10px 6px 23px;
        background-position: 5px 9px !important;
    }
    .srchbar .amenitie-box {
        width: 46%;
    }
}


</style>
</head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script> -->
<script>
    $( function() {
        $( "#datepickerFrom" ).datepicker({
            numberOfMonths: 2
        });
    } );
	
        function showDiv(id) {
            // console.log(id);
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
        /* Price range slider */
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

        function setSelectedPrice() {
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
            setTimeout(function() { 
                searchlisting();
            }, 500);

            $('.rmcaprice').hide();
            // if(hideIt == true){
            //     $('.rmcaprice').hide();
            // }

        }

        /* Room Capacity Slider */
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

        function setSelectedGuestNumber( hideIt = true) {
            GuestNumber.length = 0;

            $("#room-capacity").val($('#roomCapacity').val());
            var roomCapty = $('#roomCapacity').val();
            var roomCaptyArr = roomCapty.split("-");
            // console.log(roomCaptyArr);
            // const GuestNumberMin = $('#roomCapacity').attr('min');
            // const GuestNumberMax = $('#roomCapacity').val();
            var GuestNumberMin = roomCaptyArr[0];
            var GuestNumberMax = roomCaptyArr[1];
            GuestNumber = [GuestNumberMin, GuestNumberMax];
            //  alert(GuestNumber);
            $('#ListingCapacity').val(GuestNumber);
            $("#listing-room-capacity").val(GuestNumber);
            setTimeout(function() { 
                searchlisting();
            }, 500);
          
            if(hideIt == true){
                $('.rmcap').hide();
            }
            // $('.rmcap').hide();

        }

        function getAmentiesCount() {
            selectedValue.length = 0;
            /*   $("#room-capacity").val($('#roomCapacity').val());
              $('.rmcap').hide(); */

            // var selectedAmenities = $('.ammenties').find(":checked").val();
            // alert(selectedAmenities);
            $('.ammenties:checked').each(function() {
                selectedValue.push($(this).val());
            });
            $('#search-amenities').val(selectedValue.length + ' Amenities')
            $('#ListingAmenities').val(selectedValue);
            $("#listing-amenities").val(selectedValue);
            setTimeout(function() { 
                searchlisting();
            }, 500);
            /* if(hideIt == true){
                $('.amenities-boxes').hide();
            } */
            $('.amenities-boxes').hide();

        }

        
        function locationSearch(){
           $("#location-search").val();
            setTimeout(function() { 
                searchlisting();
            }, 500);
            };
  

	
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
<script>

$(document).ready(function(){  
$('.amenitie-box input').change(function() {
		$(this).parent().toggleClass( "chngchkboxbg" ) 
});
  
});</script>
<body>


<div class="main">
<header class="searchlihead menu-header"> 	
    {{-- {{dd(session()->all())}} --}}
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-5 col-6">
                <div class="site-logo">
                    <a href="{{ url('home') }}">
                    <img src="{{ url('imgs/jbrlogo.png') }}" class="img-fluid" alt="site-logo"></a>
                </div>
            </div>
      <div class="col-lg-7 col-md-12 col-sm-12 col-12">
          <?php //echo"<pre>";print_r($_GET);
            $ListingAmenities = isset($_GET['ListingAmenities'])?$_GET['ListingAmenities']:'';
            $ListingAmenitiesArr = explode(',',$ListingAmenities);
            // if($ListingAmenities !=''){
            //     echo 'blank';
            //     $ListingAmenitiesArr = explode(',',$ListingAmenities);
            // }else{
            //     echo 'not blank';
            //     $ListingAmenitiesArr = explode(' ',$ListingAmenities);
            // }
            
            // echo count($ListingAmenitiesArr);
            // die;
          ?>
          <?php
            $ListingCapacity = isset($_GET['ListingCapacity'])?$_GET['ListingCapacity']:'';
            $Listingarray = explode(',', $ListingCapacity);
            // echo"<pre>";print_r($Listingarray);die;
            $ListingPriceRange = isset($_GET['ListingPriceRange'])?$_GET['ListingPriceRange']:'';
            $PriceRangearray = explode(',', $ListingPriceRange);

          
          ?>
				<ul class="srchbar banner-box position-relative">
					<li>
					<input type="text" id="datepickerFrom" value="<?=isset($_GET['datepickerFrom'])?$_GET['datepickerFrom']:''?>" class="form-control calendar-icon"
                                placeholder="Select Date" > 
					
					</li>
					
					<li><input onkeyup="locationSearch()" class="form-control location-icon" name="ListingLocation" id="location-search" value="<?=isset($_GET['ListingLocation'])?$_GET['ListingLocation']:''?>" type="text" placeholder="You know the location" list="autocompleteOff"
                        autocomplete="off">


                       {{--  <div class="row my-2">
                            <div class="col-md-12 position-relative">
                                <input 
                                    class="form-control location-icon" 
                                    name="ListingLocation" 
                                    id="location-search" 
                                    type="text"
                                    placeholder="You know the location"
                                    list="autocompleteOff"
                                    autocomplete="off"
                                >
                            </div>
                        </div> --}}

					</li>
					
					<li>
						<input onfocus="showDiv('room-capacity')" class="form-control person-icon"  value="<?=isset($Listingarray[1])?$Listingarray[1]:$Listingarray[0]?>" id="room-capacity" type="text" placeholder="Room Capacity">
						<div class="selectbox rmcap diffboxes" style="display: none;">
							<!-- <p>Select number of attendees</p>
                            <p class="addsub">1 <i class="fa fa-minus" aria-hidden="true"></i> 30 
                            <i class="fa fa-plus" aria-hidden="true"></i></p>  -->
                            <p>
                                <label for="amount">Select number of attendees:</label>
                                <input type="text" id="roomCapacity" readonly style="border:0; color:#f6931f; font-weight:bold;text-align: center;">
                                </p>
                                <div id="room-slider-range"></div>

                            <input type="hidden" value="<?=isset($_GET['ListingCapacity'])?$_GET['ListingCapacity']:''?>" id="listing-room-capacity">
                            
                            <!-- <input type="range" oninput="setSelectedGuestNumber(false)" onchange="setSelectedGuestNumber(false)" name="roomCapacity" min="0" max="30" id="roomCapacity"> -->

                            <a class="btn btn-primary" onclick="setSelectedGuestNumber()">Done</a>
                        </div>
						
					</li> 
					
					<li>
                        <input onfocus="showDiv('price-range')" type="text" value="<?=isset($PriceRangearray[1])?$PriceRangearray[1]:$PriceRangearray[0]?>"  name="" id="price-range" class="form-control price-icon" placeholder="Hourly Rate"> 
                        <input type="hidden" value="<?=isset($_GET['ListingPriceRange'])?$_GET['ListingPriceRange']:''?>" id="listing-price-range">
                        <div class="selectbox rmcaprice diffboxes" style="display: none;">
                            <!-- <p>Select Price range <br>
							$0 - $400
							</p> -->
                            <p>
                                <label for="amount">Select Price range:</label>
                                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;text-align: center;">
                                </p>
                                
                                <div id="slider-range"></div>
                            <!-- <div>
                                <input type="range" name="price" min="0" max="400" id="priceRange" oninput="setSelectedPrice(false)" onchange="setSelectedPrice(false)">
                            </div> -->
                            <a class="btn btn-primary" onclick="setSelectedPrice()">Done</a>
                        </div>
                        
                        
					</li> 
<li>
                        <input onfocus="showDiv('search-amenities')" value="<?=count($ListingAmenitiesArr)?>" class="form-control amenities-icon" id="search-amenities" type="text" placeholder="Amenities">
                        <input type="hidden" value="<?=isset($_GET['ListingAmenities'])?$_GET['ListingAmenities']:''?>" id="listing-amenities">
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
					</li> 
					
							
						  
								
				</ul> 
			</div>  

            @if(Session::get('userId') != null)
            <div class="col-lg-2 col-md-4 col-sm-5 col-6">
                <ul class="menulist">
                    <li>
                        <p class="username">Hello, {{Session::get('UserName')}}</p>
                    </li>
                    <li class="profileimg">
                        <h1 class="usernameicon">{{Session::get('UserName')[0]}}</h1>
                    </li>
                    <li class="menutoggle">
                        <div class="dropdown dropdown-menu-end dropdown-menu-lg-start">
                            <div class="dropbtn"><i class="fa fa-bars"></i></div>
                            <div class="dropdown-content d-none">
                                <a href="#login" data-bs-toggle="modal" data-bs-target="#loginModalForm">Login</a>
                                <div class="modal fade" id="loginModalForm" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="exampleModalLabel">Welcome to
                                                    justboardrooms</h2>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label class="form-label">Email Address</label>
                                                        <input type="text" class="form-control" id="username"
                                                            name="username" placeholder="Username" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="password"
                                                            name="password" placeholder="Password" />
                                                    </div>
                                                    <div class="mb-3 form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="rememberMe" />
                                                        <label class="form-check-label" for="rememberMe">Remember
                                                            me</label>
                                                    </div>
                                                    <div class="modal-footer d-block">
                                                        <p class="float-left">Not yet account <a href="#">Sign
                                                                Up</a></p>
                                                        <button type="submit" class="btn float-right">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#signup">Sign Up</a>
                              
                              {{--   <hr> --}}
                                {{-- <a href="#">List my boardroom</a>
                                <a href="#">Help Center</a> --}}
                            </div>
                            <div class="dropdown-content">
                                <!--<a href="{{ route('dashboard') }}">Dashboard</a>
                                <a href="{{ route('get-messages') }}">Messages</a>
                               {{--  <a href="{{ route('saved_boardroom')}}">Saved</a> --}}
                                <hr>
                                <a href="{{ route('profile') }}">Account</a>
                                <a href="https://beta.justboardrooms.com/booking/public/home">List my boardroom</a>
                                <hr>-->
                                <a target="_blank" href="https://jbwp.ttldev.net/help-center/">Help Centre</a>
                                <a href="{{route('logout')}}">Log out</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            @endif
        </div>
    </div>
</header>


<div class="jb-main">
    @yield('content')
</div>
@include('layouts.footer')

</body>
</html>




