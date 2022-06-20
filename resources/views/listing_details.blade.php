@extends('layouts.master')
@section('content')
{{-- {{dd(session()->all())}} --}}
{{-- {{dd($listing)}} --}}
    <style>
        .modal-dialog.modlwidth {
            max-width: 800px;
        }

        .requestmodal input {
            height: unset !important;
        }

        .requestmodal .datepicker-inline {
            width: 339px;
        }

        .requestmodal .table-condensed {
            width: 100%;
        }

        .undline-text{
            text-decoration: underline !important;
        }
        .info-modal{
            text-align: center;
        }

        .info-modal .text-primary {
            color: #ff671e !important;
        }
    </style>
     
    @php
    $daysData = json_decode($listing['calender']['days'],true);
    
    //dd($daysData);
    $daysDisabled = [];
    $xplodedArr = [];
    foreach($daysData as $day => $value){
        $xplodedArr[$day] = explode('-',$value);
        if($value == '0-0'){
            if($day == 'sun'){
                $daysDisabled[] = 0;
            }elseif($day == 'mon'){
                $daysDisabled[] = 1;
            }elseif($day == 'tue'){
                $daysDisabled[] = 2;
            }elseif($day == 'wed'){
                $daysDisabled[] = 3;
            }elseif($day == 'thr'){
                $daysDisabled[] = 4;
            }elseif($day == 'fri'){
                $daysDisabled[] = 5;
            }elseif($day == 'sat'){
                $daysDisabled[] = 6;
            }
        }
    }
   // dd($xplodedArr);
    //dd(Session::get('startDate'));
    $timeSlots = [
        (object) ['StartTime' => '01:00', 'EndTime' => '02:00', 'startShow' => '01:00 AM' , 'endShow' => '02:00 AM'], 
        (object) ['StartTime' => '02:00', 'EndTime' => '03:00', 'startShow' => '02:00 AM', 'endShow' => '03:00 AM'], 
        (object) ['StartTime' => '03:00', 'EndTime' => '04:00', 'startShow' => '03:00 AM', 'endShow' => '04:00 AM'], 
        (object) ['StartTime' => '04:00', 'EndTime' => '05:00', 'startShow' => '04:00 AM', 'endShow' => '05:00 AM'], 
        (object) ['StartTime' => '05:00', 'EndTime' => '06:00', 'startShow' => '05:00 AM', 'endShow' => '06:00 AM'], 
        (object) ['StartTime' => '06:00', 'EndTime' => '07:00', 'startShow' => '06:00 AM', 'endShow' => '07:00 AM'], 
        (object) ['StartTime' => '07:00', 'EndTime' => '08:00', 'startShow' => '07:00 AM', 'endShow' => '08:00 AM'], 
        (object) ['StartTime' => '08:00', 'EndTime' => '09:00', 'startShow' => '08:00 AM', 'endShow' => '09:00 AM'], 
        (object) ['StartTime' => '09:00', 'EndTime' => '10:00', 'startShow' => '09:00 AM', 'endShow' => '10:00 AM'], 
        (object) ['StartTime' => '10:00', 'EndTime' => '11:00', 'startShow' => '10:00 AM', 'endShow' => '11:00 AM'], 
        (object) ['StartTime' => '11:00', 'EndTime' => '12:00', 'startShow' => '11:00 AM', 'endShow' => '12:00 PM'], 
        (object) ['StartTime' => '12:00', 'EndTime' => '13:00', 'startShow' => '12:00 PM', 'endShow' => '01:00 PM'], 
        (object) ['StartTime' => '13:00', 'EndTime' => '14:00', 'startShow' => '01:00 PM', 'endShow' => '02:00 PM'], 
        (object) ['StartTime' => '14:00', 'EndTime' => '15:00', 'startShow' => '02:00 PM', 'endShow' => '03:00 PM'], 
        (object) ['StartTime' => '15:00', 'EndTime' => '16:00', 'startShow' => '03:00 PM', 'endShow' => '04:00 PM'], 
        (object) ['StartTime' => '16:00', 'EndTime' => '17:00', 'startShow' => '04:00 PM', 'endShow' => '05:00 PM'], 
        (object) ['StartTime' => '17:00', 'EndTime' => '18:00', 'startShow' => '05:00 PM', 'endShow' => '06:00 PM'], 
        (object) ['StartTime' => '18:00', 'EndTime' => '19:00', 'startShow' => '06:00 PM', 'endShow' => '07:00 PM'], 
        (object) ['StartTime' => '19:00', 'EndTime' => '20:00', 'startShow' => '07:00 PM', 'endShow' => '08:00 PM'], 
        (object) ['StartTime' => '20:00', 'EndTime' => '21:00', 'startShow' => '08:00 PM', 'endShow' => '09:00 PM'], 
        (object) ['StartTime' => '21:00', 'EndTime' => '22:00', 'startShow' => '09:00 PM', 'endShow' => '10:00 PM'],
        (object) ['StartTime' => '22:00', 'EndTime' => '23:00', 'startShow' => '10:00 PM', 'endShow' => '11:00 PM'],
        (object) ['StartTime' => '23:00', 'EndTime' => '24:00', 'startShow' => '11:00 PM', 'endShow' => '12:00 PM'],
    ];
    //dd($listing);
    $reviewCollection = collect($reviews);
    $avgReviews = $reviewCollection->avg('review_stars');
    @endphp
    <?php
    
    /*  */
    ?>
    {{-- {{ $listing->listing_capacities->description }} --}}
    {{-- {{dd($listing->name)}} --}}

    {{-- {{dd($listing->pictures[0]->picture_name)}} --}}
    {{-- {{ dd($listing->hosting_rules[0]->hosting_rule) }} --}}
    <style>
        .msgsent .card-body h2,
        .msgsent .card-body p {
            color: #444444;
            font-size: 17px;
            font-family: 'Myriad Pro Regular';
        }

        .msgsent .card-body a {
            text-decoration: none;
            color: #FF671D;
        }
    </style>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
    {{-- {{dd(Session::get('totalPrice'))}} --}}
    <section class="brslider position-relative">
        {{-- Slider Start --}}
        <div id="heroImageControls" class="carousel slide" data-ride="carousel" data-bs-interval="0">
            <div class="carousel-inner">
                @foreach ($listing['pictures'] as $image)
                    <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}}">
                        <img 
                            class="d-block w-100" 
                            src="https://hostdev2.justboardrooms.com/Images/{{ $image['picture_name'] }}" 
                            alt="{{ $image['picture_name'] }}"
                        />
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#heroImageControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#heroImageControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>

        {{-- Slider End --}}

       <!-- <div class="rtbdiv text-center">
            <a class="request-to-book">THIS IS A <span
                class="text-white">{{ $listing['listing_type'] == 1 ? 'REQUEST' : 'READY' }} TO BOOK</span> BOARDROOM
            <i class="fa fa-question" data-bs-toggle="modal" data-bs-target="#requestToBookInfo"></i></a>
        </div>  -->  
    </section>
    <section class="brdetailmain pt-3 pb-5">
        <div class="container">
            <p class="gotosrchrslt"><i class="fa fa-angle-left"></i><a href="{{route('homepage')}}">Back<!--Top Rated Around You--></a></p>
            <div class="row justify-content-between">
                <div class="col-md-7 col-lg-7">
                    <section class="address position-relative py-3">
                        <a class="likes tolikes{{$listing['id']}}" href="javascript:void(0)" onclick="fakeSave('{{$listing['id']}}',true)">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                        </a>
                        
                        <h4>{{ $listing['name'] }}</h4>
                        @if(count($reviews) > 0)
                        <ul class="fivestars m-0 p-0">
                            @for ($i = 1; $i <= $avgReviews; $i++)
                                <li><i class="fa fa-star"></i></li>    
                            @endfor
                            <li class="starcounting">{{floor($avgReviews)}}</li>    
                        </ul>
                        @endif
                        {{-- <ul class="fivestars m-0 p-0">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li class="starcounting">121</li>
                        </ul> --}}
                        <p class="locnm mt-3">

                            {{ $listing['address']['formatted_address'] }}<br />

                        </p>
                        <p class="locnm">Boardroom name: <b>{{ $listing['name'] }}</b></p>
                        <p>
                            <b>Room capacity: </b>{{ $listing['capacity']['description'] }}<br />
                            <b>Minimum booking duration:</b> {{ $listing['min_hour'] }}
                        </p>
                        <p>
                            {{ $listing['description'] }}

                            <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et nunc tristique, ornare enim ut, sagittis libero. Duis ac libero velit. Aliquam vitae hendrerit tortor, sit amet dapibus nisi. Vestibulum nulla
                                            ante, vehicula vel turpis eu, congue ultricies nibh. Vestibulum eu purus augue. Nullam convallis quis ipsum vel pulvinar. In rhoncus diam sed efficitur iaculis. Integer et augue pretium, commodo sapien eu, ultricies
                                            arcu. Praesent auctor metus dolor, in aliquet dui suscipit sed.-->
                        </p>
                    </section>

                    <section class="amenities-boxes detail-amen-box d-block position-relative pb-3">
                        <h4>Amenities</h4>
                        @if (count($listing['listing_amenities']) == 0)
                            <p>There is no amenities added</p>
                        @endif

                        <div class="row mb-2">

                            @foreach ($listing['listing_amenities'] as $images)
                                <div class="col-md-3 col-sm-3 col-4">
                                    <img src=" {{ asset('amenities/' . $images['icon']) }}" class="img-fluid mt-2" alt="{{$images['name']}}" />
                                </div>
                            @endforeach
                        </div>

                    </section>

                    @if (count($listing['listing_amenities']) > 0)
                        <section class="features pb-4">
                            <h4>Features</h4>
                            <ul class="features-list">
                                @foreach ($listing['listing_amenities'] as $feature)
                                    <li class="feature-all feature-{{ $loop->index + 1 }}"
                                        style="{{ $loop->index > 3 ? 'display:none' : '' }}">{{ $feature['name'] }}
                                    </li>
                                @endforeach
                            </ul>
                            @if (count($listing['listing_amenities']) > 4)
                                <a onclick="showMore('feature')" id="feature-show-btn" class="undline-text">Show all Features</a>
                                <a onclick="showLess('feature')" id="feature-hide-btn" style="display: none;" class="undline-text">Show less</a>
                            @endif
                        </section>
                    @endif

                    <section class="house-rules">
                        @if (count($listing['hostingRule']) > 0)
                            <h4>House Rules</h4>

                            <ul class="house-rules">
                                @foreach ($listing['hostingRule'] as $rule)
                                    <li class="hrules-all hrules-{{ $loop->index + 1 }}"
                                        style="{{ $loop->index > 3 ? 'display:none' : '' }}">{{ $rule }}</li>
                                @endforeach
                            </ul>
                            @if (count($listing['hostingRule']) > 4)
                                <a onclick="showMore('hrules')" id="hrules-show-btn" class="undline-text">Show all House Rules</a>
                                <a onclick="showLess('hrules')" id="hrules-hide-btn" style="display: none;" class="undline-text">Show less</a>
                            @endif <br>
                        @endif

                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                            data-bs-target="#contacthostModal">CONTACT HOST</button>
                        <div class="modal fade" id="contacthostModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body p-5">

                                        <p class="text-end mb-0"><button type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button></p>

                                        <div class="row py-3">
                                            <div class="col-md-6">
                                                <img src="{{ asset('imgs/popupimg.jpg') }}" class="img-fluid"
                                                    alt="img">
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="mb-0"></h5>
                                                <p class="popup text-muted">
                                                    <strong>{{ $listing['name'] }}</strong></br>
                                                    <span
                                                        style="color:#B7B7B7;">{{ $listing['address']['formatted_address'] }}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your Message..."></textarea>

                                        <button type="button" class="btn btn-primary mt-3"
                                            onclick="sendmsg('{{ $listing['id'] }}','{{ $listing['user_id'] }}')"
                                            style="padding: 5px 20px; background-color: #ff671d; border-color: #ff671d;">SEND</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-5 col-lg-4">
                    <section class="request-card">

                        @if (Session::get('startdate'))
                            <div class="row ps-4 justify-content-between">
                                <div class="col-md-5 col-lg-5 col-sm-5 col-6">
                                    <p class="date" style="font-size: 14px !important">{{\Carbon\Carbon::parse(Session::get('startdate'))->format('M d, Y') }} </p>
                                </div>
                                <div class="col-md-5 col-lg-5 col-sm-5 col-6">
                                    <ul>
                                        <li> {{ $listing['currency'] }}</li>
                                        <li><img src="{{ asset(($listing['currency'] == 'USD') ? 'imgs/usd-flag.jpg' : 'imgs/cad-flag.jpg') }}" class="img-fluid" /></li>
                                    </ul>
                                </div>
                                <h4 class="calculate_rate">${{ $price }}</h4>
                                <p>{{ $hourdiff }} hours</p>
                               
                                <p> {{\Carbon\Carbon::createFromFormat('H:i',Session::get('time'))->format('g:i A')}} -  {{\Carbon\Carbon::createFromFormat('H:i',Session::get('timeout'))->format('g:i A')}}</p>

                                <a class="chngchk" id="datechange" data-bs-toggle="modal"
                                    data-bs-target="#checkavailabilityModal" href="javascript:void(0)">Change date / Check
                                    availability</a>
                            </div>
                            <div class="col-md-12 px-0">
                                    <form action="{{ url('/payment') }}" method="post" id="reqBoardForm">
                                        @csrf
                                        <input type="hidden" class="totalPricehid" value="{{ $calculate_rate }}"
                                            name="calculate_rate" id="totalPricehid">
                                        <input type="hidden" value="{{ $listing['id'] }}" name="listingId"
                                            id="listingId">
                                        <input type="hidden" value="{{ Session::get('startdate') }}" name="startDate"
                                            id="startDate">
                                        <input type="hidden" value="{{ Session::get('enddate') }}" name="endDate"
                                            id="endDate">
                                        <input type="hidden" value="{{ Session::get('time') }}" name="startHour"
                                            id="startHour">
                                        <input type="hidden" value="{{ Session::get('timeout') }}" name="endHour"
                                            id="endHour">
                                        <input type="hidden" value="{{ Session::get('checkInShow') }}" name="startHourShow"
                                            id="startHourShow">
                                        <input type="hidden" value="{{ Session::get('checkOutShow') }}" name="endHourShow"
                                            id="endHourShow">
                                        
                                        <button type="button" id="checkout"
                                            {{ Session::get('totalPrice') == 0 ? 'disabled' : '' }}
                                            class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#requestBoardroomSubmit">REQUEST THIS BOARDROOM</button>
                                    </form>
                                </div>
                        @else
                        <section class="availability-card">
                            <div class="row justify-content-between">
                                <div class="col-md-5 col-lg-5 col-sm-5 col-5">                          
                                    <p class="pricehrdy date"><strong>${{ $listing['price_per_hour'] }}</strong><span>/hr</span></p>
                                </div>
                                <div class="col-md-5 col-lg-5 col-sm-4 col-5">
                                    <ul>
                                        <li> {{ $listing['currency'] }}</li>
                                        <li><img src="{{ asset(($listing['currency'] == 'USD') ? 'imgs/usd-flag.jpg' : 'imgs/cad-flag.jpg') }}" class="img-fluid" /></li>
                                    </ul>
                                </div>
                            </div>

                            <hr>
                                <div class="row justify-content-between">
                                @if($listing['half_day_discount'] == 1 || $listing['full_day_discount'] == 1)
                                    @if($listing['half_day_discount'] == 1)
                                        
                                        
                                        <div class="col-md-8 col-sm-8">
                                            <p class="pricehrdy date"><strong>${{ ($listing['price_per_day']/2) - ((($listing['price_per_day']/2) * $listing['half_discount_rate'])/100) }}</strong><span> &#189; day</span></p>
                                            <p class="mb-0">Min. 4 consecutive hours</p>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <p class="dicnt"><strong>{{ $listing['half_discount_rate'] }}</strong>%<br>Discount</p>
                                        </div>
                                    
                                    @endif
                                </div>
                                 <hr>
                                <div class="row justify-content-between">
                                    @if($listing['full_day_discount'] == 1) 
                                       
                                        <div class="col-md-8 col-sm-8">
                                            <p class="pricehrdy"><strong>${{ $listing['price_per_day'] - (($listing['price_per_day'] * $listing['full_discount_rate'])/100) }}</strong><span>/day</span></p>
                                            <p class="mb-0">Min. 8 consecutive hours</p>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <p class="dicnt"><strong>{{ $listing['full_discount_rate'] }}</strong>%<br>Discount</p>
                                        </div>
                                    @endif

                                @endif
                            </div>
                             
                                    <button class="btn btn-outline-secondary btn-block" type="button" id="datechange"
                                        data-bs-toggle="modal" data-bs-target="#checkavailabilityModal">CHECK AVAILABILITY</button>

                            
                        </section>
                        @endif

                        <div class="modal fade" id="requestToBookInfo" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" style="width:430px;">
                                <div class="modal-content">
                                    <div class="modal-body py-5">

                                        <p class="text-end mb-0"><button type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button></p>

                                        <section class="requestmodal px-2">
                                            <div class="info-modal" >
                                                <h5 class="mb-3" style="font-family: Myriad Pro Bold;">REQUEST TO BOOK</h5> 
                                                <p class="mb-4"> Your boardroom booking request will be pending until it is approved by the Host. The Host will reply within 24 hours. You will not be charged until your request is approved.</p>
                                                <p data-bs-dismiss="modal" style="cursor: pointer;" class="text-primary">OK</p>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="requestBoardroomSubmit" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <div class="modal-dialog" style="width:430px;">
                                <div class="modal-content">
                                    <div class="modal-body py-5">

                                        <p class="text-end mb-0"><button type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button></p>

                                        <section class="requestmodal px-2">
                                            <div class="info-modal" >
                                                <h5 class="mb-3" style="font-family: Myriad Pro Bold;">REQUEST TO BOOK</h5> 
                                                <p class="mb-4"> You are requesting to book a boardroom. You will not be charged until your request is approved. The Host will reply to your request within 24 hours.</p>
                                                <p class="text-primary" style="cursor: pointer;" onclick="$('#reqBoardForm').submit();">OK</p>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="checkavailabilityModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">

                                        <p class="text-end mb-0"><button type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button></p>

                                        <section class="requestmodal">
                                            
                                            <!-- <div class="form-check bigbox">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Full Day booking available
                                                </label>
                                            </div> -->
                                            <x-booking-card />
                                            <div class="row py-3 mx-0">
                                                <div class="col-md-6 cavailcalsec">
                                                    <div id="date-picker"></div>
                                                    @if(Session::get('isFullDay') == 1)
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#datechange').on('click',function(){
                                                                setTimeout(() => {
                                                                    // alert("{{Session::get('isFullDay')}}")
                                                                    $('body #bookByDay').trigger('click');
                                                                }, 500);
                                                               
                                                            })
                                                           
                                                        });
                                                       
                                                    </script>
                                                    @endif
                                                    <div class="select-checks">
                                                        <label>
                                                            <input type="checkbox" id="bookByDay" onclick="bookByDay()" disabled>
                                                            Book by Day
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" id="bookByHour" onclick="bookByHour()" disabled>
                                                            Book by Hour
                                                        </label>
                                                    </div>
                                                    <div class="book-by-hour" style="display:none;">
                                                        <label>
                                                            <select onchange="fromHourBooking()" id="fromHourBooking">
                                                                <option value="">From</option>
                                                                @foreach ($timeSlots as $index => $time)
                                                                    <option value="{{ $index }}"
                                                                        class="fromOptCl"
                                                                        id="fromOpt{{ $index }}"
                                                                        data-sno="{{ $index }}">
                                                                        {{ $time->startShow }}</option>
                                                                @endforeach
                                                                <select>
                                                        </label>

                                                        <label>
                                                            <select onchange="toHourBooking()" id="toHourBooking" disabled>
                                                                <option value="">To</option>
                                                                @foreach ($timeSlots as $index => $time)
                                                                    <option value="{{ $index }}"
                                                                        class="toOptCl"
                                                                        id="toOpt{{ $index }}"
                                                                        data-sno="{{ $index }}">
                                                                        {{ $time->endShow }}</option>
                                                                @endforeach
                                                                <select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="timeSlots" style="display:none;">
                                                    <p><b id="date-avail-top"><script>document.write(moment().format('MMMM Do YYYY'))</script></b> Availability</p>
                                                    <input type="hidden" id="min-hours" value="{{ $listing['min_hour'] }}">
                                                    <ul>
                                                        @foreach ($timeSlots as $index => $time)
                                                            <li>
                                                                {{ $time->startShow . ' - ' . $time->endShow }}
                                                                <input type="checkbox" name="" class="timebookings"
                                                                    data-sno="{{ $index }}"
                                                                    data-start="{{ $time->StartTime }}"
                                                                    data-end="{{ $time->EndTime }}"
                                                                    data-startShow="{{ $time->startShow }}"
                                                                    data-endShow="{{ $time->endShow }}"
                                                                    id="time-no-{{ $index }}"
                                                                    onclick="bookingTime()"
                                                                    {{ Session::get('startdate') != null ? (Session::get('time') == $time->StartTime || Session::get('timeout') == $time->EndTime ? 'checked' : '') : '' }}>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="cavl-submit-sec col-md-6">
                                                <p class="available-price">Full day: <b>${{ $listing['price_per_day'] - (($listing['price_per_day'] * $listing['full_discount_rate'])/100) }}</b></p>
                                                <button class="avlcancle btn" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                                <button class="avlsubmit" onclick="updateDateTime()">DONE</button>
                                            </div>

                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
            @if(count($reviews) > 0)
            <section class="reviews py-5 align-items-center">
                <div class="row mb-4">
                    <div class="col-md-2 col-lg-1 col-4">
                        <h4 class="mb-0">Reviews</h4>
                    </div>
                    <div class="col-md-3 col-lg-2 col-4">
                        <ul class="fivestars m-0 p-0">
                            @for ($i = 1; $i <= $avgReviews; $i++)
                                <li><i class="fa fa-star"></i></li>
                            @endfor
                            <li class="starcounting">{{floor($avgReviews)}}</li>
                        </ul>
                    </div>
                </div>
                <p class="brbtm" style="cursor: pointer;">
                    <span class="most-recent-reviews" onclick="sortMostRecent()">Most Recent</span>
                    <span class="highest-rated-reviews" onclick="sortHighestRated()"> | &nbsp; Highest Rated</span>
                </p>




                <div class="row py-3" id="review-area">
                    @foreach ($reviews as $review)
                        <div class="col-md-5 single-revv" data-recent="{{$loop->index}}" data-rating="{{ $review['review_stars'] }}">
                            <div class="row justify-content-between">
                                <div class="col-md-3">
                                    <p class="mb-0">{{ $review['first_name'] }}</p>
                                </div>
                                <div class="col-md-3 text-end">
                                    <p class="mb-0">{{ date('F j, Y', strtotime($review['created_at'])) }}</p>
                                </div>
                            </div>
                            <ul class="fivestars m-0 p-0">
                                @for ($i = 1; $i <= $review['review_stars']; $i++)
                                    <li><i class="fa fa-star"></i></li>
                                @endfor
                            </ul>
                            <p><strong>{{ $review['review'] }}</strong></p>
                            <p>{{ $review['headline'] }}</p>
                        </div>
                    @endforeach

                </div>

<script>
    function sortHighestRated(){
        const result = [...$('.single-revv')].sort((a, b) => {
            const contentA = parseInt($(a).data('rating'));
            const contentB = parseInt($(b).data('rating'));
            return (contentA > contentB) ? -1 : (contentA < contentB) ? 1 : 0;
        });
        $('#review-area').html(result);
        $('.highest-rated-reviews').addClass('active');
        $('.most-recent-reviews').removeClass('active');
    }

    function sortMostRecent(){
        const result = [...$('.single-revv')].sort((a, b) => {
            const contentA = parseInt($(a).data('recent'));
            const contentB = parseInt($(b).data('recent'));
            return (contentA > contentB) ? -1 : (contentA < contentB) ? 1 : 0;
        });
        $('#review-area').html(result);
        $('.highest-rated-reviews').removeClass('active');
        $('.most-recent-reviews').addClass('active');
    }
    sortMostRecent();
</script>


                <!-- <div class="row py-3">
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
                                <p>Cras dignissim, ante non varius suscipit, urna libero condimentum sem, id convallis enim odio ut
                                    metus. Aliquam condimentum mi sem. Sed consequat porttitor nisl in ullamcorper.</p>
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
                                <p>Cras dignissim, ante non varius suscipit, urna libero condimentum sem, id convallis enim odio ut
                                    metus. Aliquam condimentum mi sem. Sed consequat porttitor nisl in ullamcorper.</p>
                            </div>
                        </div>
                        <a href="">Show all Reviews</a> -->
            </section>
            @endif
            <section class="location mt-5">
                <h4>Location</h4>
                <!-- <iframe width="450" height="250" frameborder="0" style="border:0;"
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed/v1/place?q={{ $listing['address']['lat'] }},{{ $listing['address']['lng'] }}&key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg"
                    allowfullscreen>]
                </iframe> -->

                <div class="col-md-12 px-0">
                    <div id="map-listing" style="height: 100%; height:420px;"> </div>
                </div>
            </section>
          <section class="otherbrthishost py-5" style="display:none">
                <div class="row">
                    <div class="col-md-12">
                    @if(count($other_boardrooms) > 0)
						<h4>Other Boardrooms From This Host</h4>

                        <div class="cardslider flex-wrap row">
                            @foreach ($other_boardrooms as $boardroom)
                                {{-- {{dd($boardroom)}} --}}
                                
                                    <div class="col-xl-3 col-md-4 col-sm-6 col-10 mx-0 py-3">
                                        <a style="text-decoration: none;"  href="{{ '/booking/public/listing-details/' . $boardroom['id'] }}">
                                        <div class="card">
                                            <div id="carouselExampleIndicators{{$loop->index}}" class="carousel slide" data-bs-interval="0" data-bs-ride="carousel">
                                                <!-- <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                                        data-bs-slide-to="0" class="active" aria-current="true"
                                                        aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                </div> -->
                                                <div class="carousel-inner" style="height: 10rem">

                                                    @php $key = 0;@endphp

                                                    @foreach ($boardroom['listing_gallery'] as $images)
                                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                            <img
                                                                src='https://hostdev2.justboardrooms.com/Images/{{ $images['picture_name'] }}'>

                                                        </div>
                                                        @php $key++;@endphp
                                                    @endforeach
                                                </div>
                                                @if(count($boardroom['listing_gallery']) > 1)
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleIndicators{{$loop->index}}" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleIndicators{{$loop->index}}" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                @endif
                                                <a class="discavl">DISCOUNT AVAILABLE</a>
                                                <a class="rdybook">{{ $boardroom['listing_type'] == 1 ? 'REQUEST' : 'READY' }}
                                                    TO BOOK</a>
                                                <!-- <a class="pprpln"><i class="fa fa-paper-plane-o"
                                                        aria-hidden="true"></i>&nbsp;1.1km</a>-->
                                                <a id="likes" onclick="fakeSave('{{$boardroom['id']}}')" class="likes tolikes{{$boardroom['id']}}">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a> 

                                            </div>
                                            <a style="text-decoration: none;"  href="{{ '/booking/public/listing-details/' . $boardroom['id'] }}">
                                            <div class="card-body" style="font-family: 'Myriad Pro Semibold';">
                                                <h5 class="card-title">{{ $boardroom['name'] }}</h5>
                                                <p class="card-text">${{ $boardroom['price_per_hour'] }}/Hr &emsp;
                                                    ${{ $boardroom['price_per_day'] }}/Day</p>
                                                <h5 class="card-title">
                                                    {{ $boardroom['address']['formatted_address'] }}
                                                </h5>


                                                <ul class="fivestars m-0 p-0">
                                                    @php 
                                                        $reviews = $boardroom['reviews_avg_review_stars'];
                                                        if($reviews == ''){
                                                            $reviews = 0 ;
                                                        }
                                                    @endphp
                                                    @for($i = 1; $i <= $reviews; $i++)
                                                        <li><i class="fa fa-star"></i></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                        </a>
                                        </div>
                                    </a>
                                    </div>
                                
                            @endforeach
                        </div>
						@endif
                    </div>
                </div>

        </div>
    </section>
    </div>
    </section>

    <div class="modal fade" id="contacthostModalSuccess" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <section class="msgsent">
                    <div class="card p-4">
                        <p class="text-end m-0"><button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button></p>
                        <div class="card-body text-center">
                            <h2 class="card-title pb-3"><b>MESSAGE SENT</b></h2>
                            <p>The host will reply to you as soon as they are able.</p>
                            {{-- <a href="#"><strong>OK</strong></a> --}}
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- </form> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function showAvailModal() {
            const availModal = new bootstrap.Modal(document.getElementById('checkavailabilityModal'), {});
            availModal.show();
        }

        function sendmsg(ListingId, userId) {
            var msg = $('#exampleFormControlTextarea1').val();

            if (msg != '') {
                $.ajax({
                    type: 'post',
                    url: "{{ url('https://hostdev2.justboardrooms.com/api/saveMessage') }}",
                    data: {
                        message: msg,
                        listId: ListingId,
                        receiverId: userId,
                        coversationId: '{{ $listing['conversation_id'] }}',
                        user_id: '{{ Session::get('userId') }}',
                    },
                    success: function(response) {
                        $('#contacthostModalSuccess').modal('show');
                        $('#contacthostModal').modal('hide');
                    }
                });
            } else {
                alert('enter Message!');
            }
        }

        let $ = jQuery;
        $(function() {
            $("#datepickerFrom").datepicker();


        });

        $(function() {
            $("#datepickerTo").datepicker();
        });

        function getdate() {

            $.ajax({
                type: 'post',
                url: @json(url('/getdate')),
                data: {
                    // 'name': name,
                    // 'price_per_hour': price_per_hour ,
                    // 'price_per_day': price_per_day ,
                    // 'formatted_address': formatted_address,
                    //"_token": @json(csrf_token()),
                },
                success: function(response) {
                    $("#listing-section").html(response);
                }
            });
        }

        function updateDateTime() {
            var isFullDay = $('#bookByDay').is(':checked') ? 1:0;
            /* alert(isFullDay);
            return; */
            var selectedDay = $('.avlsubmit').data('day');
            // alert(selectedDay);
            // return;
            var startDate = $('#date-picker').data('datepicker').getFormattedDate('mm/dd/yyyy');
            var startDate = $('#date-picker').data('datepicker').getFormattedDate('mm/dd/yyyy');
            var endDate = startDate;
            var checkIn = '';
            var checkOut = '';
            var checkInShow = '';
            var checkOutShow = '';
            const selectedTimings = $('input.timebookings:checked').length;

            if (selectedTimings == 1) {
                checkIn = $('input.timebookings:checked:first').data('start');
                checkOut = $('input.timebookings:checked:first').data('end');
                checkInShow = $('input.timebookings:checked:first').data('startShow');
                checkOutShow = $('input.timebookings:checked:first').data('endShow');
            } else {
                checkIn = $('input.timebookings:checked:first').data('start');
                checkOut = $('input.timebookings:checked:last').data('end');
                checkInShow = $('input.timebookings:checked:first').data('startShow');
                checkOutShow = $('input.timebookings:checked:last').data('endShow');
            }

            if (checkIn != '' && checkOut != '') {
                $.ajax({
                    type: 'post',
                    url: @json(url('/getdate')),
                    data: {
                        listingId:'{{$listing["id"]}}',
                        startDate: startDate,
                        endDate: endDate,
                        checkIn: checkIn,
                        checkOut: checkOut,
                        checkInShow: checkInShow,
                        checkOutShow: checkOutShow,
                        isFullDay:isFullDay,
                        selectedDay:selectedDay,

                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            }

        }

        function selectdate() {
            var startDate = $('#datepickerFrom').val();
            var endDate = $('#datepickerTo').val();
            var checkIn = $("#check_in").val();
            var checkOut = $("#check_out").val();




            $.ajax({
                type: 'post',
                url: @json(url('/getdate')),
                data: {
                    startDate: startDate,
                    endDate: endDate,
                    checkIn: checkIn,
                    checkOut: checkOut

                },
                success: function(response) {
                    console.log(response.totalPrice);
                    $(".totalPrice").html(response.totalPrice);
                    $('#totalPricehid').val(parseFloat($('#totalPricehid').val()) + response.totalPrice);
                    // $("#totalPricehid").html(response.totalPrice);
                    $(".calculate_rate").html(response.calculate_rate);
                    $(".startdate").html(response.start_date);
                    $(".enddate").html(response.end_date);
                    $("body #hourDifference").val(response.Hours);
                    $(".hourDiff").html(response.Hours);
                    $(".time").html(response.time);
                    $(".time").html(response.timeout);

                    if (response.totalPrice > 0) {
                        $('#checkout').prop('disabled', false);
                    } else {
                        $('#checkout').prop('disabled', true);
                    }

                }
            });
        }

        $(document).ready(function() {
            //getdate();

            $('#date-picker').datepicker({
                maxViewMode: 3,
                daysOfWeekDisabled: @json($daysDisabled),
                daysOfWeekHighlighted: "0,6",
                todayHighlight: true,
                datesDisabled: ['06/06/2022', '06/21/2022'],

            }).on('changeDate', function (ev) {
                
                var dateAvail = moment(ev.date).format('MMMM Do YYYY');
                $('#bookByHour').prop('disabled', false);
                $('#bookByDay').prop('disabled', false);
                $('#date-avail-top').text(dateAvail);
                $('.timebookings').prop('checked', false);
                $('#bookByDay').prop('checked', false);
                $('#bookByHour').prop('checked', false);

                var weekDay = '';
                var dayNo = moment(ev.date).format('e') ;
                if(dayNo == 0){
                    weekDay = 'sun' ;
                }else if(dayNo == 1){
                    weekDay = 'mon' ;
                }else if(dayNo == 2){
                    weekDay = 'tue' ;
                }else if(dayNo == 3){
                    weekDay = 'wed' ;
                }else if(dayNo == 4){
                    weekDay = 'thr' ;
                }else if(dayNo == 5){
                    weekDay = 'fri' ;
                }else if(dayNo == 6){
                    weekDay = 'sat' ;
                }
                adjustTimings(weekDay);
                $('.avlsubmit').attr('data-day',weekDay);
                $('#timeSlots').show();
            });

            if (@json(Session::get('startdate'))) {
                $('#date-picker').datepicker().datepicker("setDate", new Date(@json(Session::get('startdate'))));
                bookingTime();
            }




            // var TimeSlots = [
            //     {StartTime:'09:00',EndTime:'10:00'},
            //     {StartTime:'10:00',EndTime:'11:00'},
            //     {StartTime:'11:00',EndTime:'12:00'},
            //     {StartTime:'12:00',EndTime:'13:00'},
            //     {StartTime:'13:00',EndTime:'14:00'},
            //     {StartTime:'14:00',EndTime:'15:00'},
            //     {StartTime:'15:00',EndTime:'16:00'},
            //     {StartTime:'16:00',EndTime:'17:00'},
            //     {StartTime:'17:00',EndTime:'18:00'},
            //     {StartTime:'18:00',EndTime:'19:00'},
            //     {StartTime:'19:00',EndTime:'20:00'},
            //     {StartTime:'20:00',EndTime:'21:00'},
            //     {StartTime:'21:00',EndTime:'22:00'},
            // ];




            // TimeSlots.map((time, index) => {
            //     $('#timeSlots').append(' <label>'+time.StartTime+' - '+ time.EndTime +' <input type="checkbox" name="" class="timebookings" data-sno="'+index+'" data-start="'+time.StartTime+'" data-end="'+time.EndTime+'" id="time-no-'+index+'" onclick="bookingTime()"></label><br>');
            // });


        });

        // let heart = document.getElementById('heart');
        // heart.addEventListener('click', () => {
        //     if (heart.classList.contains('red')) {
        //         heart.classList.remove('red');
        //         heart.classList.add('white');
        //         heart.src = 'whiteHeart.png';
        //     } else {
        //         heart.classList.remove('white');
        //         heart.classList.add('red');
        //         heart.src = 'redHeart.png';
        //     }
        // });

        function bookingTime() {
            const selectedTimings = $('input.timebookings:checked').length;

            if (selectedTimings > 2) {
                $('.timebookings').prop('checked', false);
            } else if (selectedTimings == 2) {
                firstSelectedValue = $('input.timebookings:checked:first').data('sno');
                secondSelectedValue = $('input.timebookings:checked:last').data('sno');

                

                $('.timebookings').each(function() {
                    var curr = $(this).data('sno');
                    if ((curr > firstSelectedValue) && (curr < secondSelectedValue)) {
                        $(this).prop('checked', true);
                    }
                });

                if((secondSelectedValue - firstSelectedValue) < ($('#min-hours').val() -1 ) ){
                    $('.timebookings').prop('checked', false);
                    alert('You need to book minimum '+$('#min-hours').val()+' hours');
                }

            }
        }



        function fromHourBooking() {
            var fromVal = $('#fromHourBooking').val(); //Value of from select field
            if (fromVal == '') {
                //If from select field is empty, setting To select to empty and disabling it.
                $('#toHourBooking').prop('disabled', true);
                $('#toHourBooking').val('');
            } else {
                //Disabling the timings in TO select field which are less than FROM timings
                $('.toOptCl').each(function() {
                    $(this).prop('disabled', false);
                    if (parseInt($(this).val()) < parseInt(fromVal)) {
                        $(this).prop('disabled', true);
                    }
                });
                //Enabling TO select field if FROM select field is not empty
                $('#toHourBooking').prop('disabled', false);
            }
            //If from field is changed to a value greater than TO select field
            if (fromVal >= $('#toHourBooking').val()) {
                $('#toHourBooking').val('');
            }
            //Calling toHourBooking function, so that checkboxes update onchnage of from field
            toHourBooking();
        }

        function toHourBooking() {

            from = $('#fromHourBooking').val(); //Value of From select field
            to = $('#toHourBooking').val(); //Value of To Select field

            $('.timebookings').prop('checked', false); //Removing check from all checkboxes

            firstSelectedValue = $('#time-no-' + from).data('sno');
            secondSelectedValue = $('#time-no-' + to).data('sno');

            //Checking the expected values
            $('.timebookings').each(function() {
                var curr = $(this).data('sno');
                if ((curr >= firstSelectedValue) && (curr <= secondSelectedValue)) {
                    $(this).prop('checked', true);
                }
            });

            if((secondSelectedValue - firstSelectedValue) < ($('#min-hours').val() -1 ) ){
                $('.timebookings').prop('checked', false);
                alert('You need to book minimum '+$('#min-hours').val()+' hours');
            }
        }

        function bookByDay() {

            $('#bookByHour').prop('checked', false);
            $('.book-by-hour').hide();
            $('.timebookings').each(function(){
                if(!$(this).hasClass('disabledByDay')){
                    $(this).prop('checked', true);
                }
            });
            if ($('#bookByDay').prop('checked') == false) {
                $('.timebookings').prop('checked', false);
            }

        }

        function bookByHour() {
            $('#bookByDay').prop('checked', false);
            $('.book-by-hour').show();
            $('#fromHourBooking').val('');
            $('#toHourBooking').val('');
            $('.timebookings').prop('checked', false);

            if ($('#bookByHour').prop('checked') == false) {
                $('.book-by-hour').hide();
            }
        }

        function showMore(showClass) {
            $('.' + showClass + '-all').show();
            $('#' + showClass + '-show-btn').hide();
            $('#' + showClass + '-hide-btn').show();
        }

        function showLess(showClass) {
            $('.' + showClass + '-all').hide();
            $('#' + showClass + '-show-btn').show();
            $('#' + showClass + '-hide-btn').hide();

            for (let i = 1; i <= 4; i++) {
                $('.' + showClass + '-' + i).show();
            }
        }

        function adjustTimings(day = 'mon'){
            var alldays = @json($xplodedArr);
            alldays = Object.entries(alldays);
            alldays.map((item) => {
                if(item[0] == day){
                    var strtTym = item[1][0];
                    var endTym = item[1][1];
                    var startSno = $('.timebookings[data-start="'+strtTym+'"]').data('sno');
                    var endSno = $('.timebookings[data-end="'+endTym+'"]').data('sno');


                    $('.timebookings').each(function(){
                        $(this).parent().show();
                        $(this).prop('disabled', false);
                        $(this).removeClass('disabledByDay');
                        if(($(this).data('sno') < startSno) || ($(this).data('sno') > endSno)){
                            $(this).prop('disabled', true);
                            $(this).addClass('disabledByDay');
                            $(this).parent().hide();
                        }
                    });

                    $('.fromOptCl').each(function(){
                        $(this).show();
                        $(this).prop('disabled',false);
                        if(($(this).data('sno') < startSno) || ($(this).data('sno') > endSno)){
                            $(this).prop('disabled', true);
                            $(this).hide();
                        }
                    });

                    $('.toOptCl').each(function(){
                        $(this).show();
                        $(this).prop('disabled',false);
                        if(($(this).data('sno') < startSno) || ($(this).data('sno') > endSno)){
                            $(this).prop('disabled', true);
                            $(this).hide();
                        }
                    });

                }
            });

            console.log(alldays);
        }

        //adjustTimings();
        // function initMap() {
        //     const myLatLng = { lat: -25.363, lng: 131.044 };
        //     const map = new google.maps.Map(document.getElementById("map-listing"), {
        //         zoom: 4,
        //         center: myLatLng,
        //     });

        //     new google.maps.Marker({
        //         position: myLatLng,
        //         map,
        //         title: "Hello World!",
        //     });
        // }


        function initMap() {
            var locationArr = { lat: parseFloat(@json($listing['address']['lat'])), lng: parseFloat(@json($listing['address']['lng'])) };
console.log(locationArr);
            var mapOptions = {
                center: locationArr,
                zoom: 14
            };

            const map = new google.maps.Map(document.getElementById('map-listing'), mapOptions);
            const icon = {
                url: "https://hostdev2.justboardrooms.com/Images/LocationPointer.png", // url
                scaledSize: new google.maps.Size(35, 50), // scaled size
            
            };

            new google.maps.Marker({
                position: locationArr,
                map: map,
                icon:icon
            });
        }
    </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg&libraries=places&callback=initMap"></script>
@endsection
