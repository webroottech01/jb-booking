{{-- <!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		 
		<!-- Latest compiled JavaScript -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
		
		<!---CSS link --->
		<link rel="stylesheet" href="https://hostdev2.justboardrooms.com/booking/public/css/nw-justboardrooms_style.css">
		
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/> -->
	
	</head> --}}

{{-- {{dd('ON VIEW',$User)}} --}}
@extends('layouts.master')
@section('content')
    <style>
        .btn-primary {
            background-color: #ff671d;
            border-color: #ff671d;
        }

        .btn-primary:hover {
            background-color: #ff671d;
            border-color: #ff671d;
        }
    </style>
    <div class="dashboard listed py-5">
        <div class="modal hosting-submit" id="agree-to-terms-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-11 justify-content-center">
                            <div class="col-12 align-self-center">
                                <h3 class="modal-title" style="text-align-last: center;">Almost done</h3>
                            </div>
                        </div>
                        <div class="col-1 justify-content-center">
                            <div class="align-self-center">
                                <button type="button" class="close" data-dismiss="modal">x</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body term-body p-2">
                        <div class="card example-1 border-0 scrollbar-ripe-malinka">
                            <div class="card-body p-0">
                                <!-- <h4 id="section1"><strong>Hosting submit</strong></h4> -->
                                <iframe src="https://api.justboardrooms.com/api-PROD/terms_host.php" allowfullscreen=""
                                    frameborder="0" style="width:100%;border:none;height: 483px;">
                                </iframe>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="term-footer">
                            <button type="button" class="btn btn-secondary mr-4 close"
                                id="btn-accept-terms-dashboard">AGREE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="lefthead pe-3">
                        <ul class="Profile">
                            <li class="profile-username">{{ $User['user']['first_name'][0] }}</li>
                            <li class="profile-name">Welcome {{ $User['user']['first_name'] }}</li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $User['progress_sum'] }}%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="prgrsinfo"><b>Your account is {{ $User['progress_sum'] }}% done!</b></p>
                        <div class="threeoptn">
                            <div class="custom-control custom-checkbox">
                                <label class="custom-control-label" id="customCheck1" for="customCheck1">Agree to Terms &
                                    Conditions</label>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <label class="custom-control-label" for="customCheck1">Complete Account Information</label>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <label class="custom-control-label" for="customCheck1">Complete Settings</label>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            </div>
                        </div>
                        <a class="text-decoration-none" href="{{ route('profile') }}">
                            <p style="font-family: 'Myriad Pro Regular';" class="updtac">UPDATE YOUR ACCOUNT</p>
                        </a>
                        <hr>
                        <div class="listing-inbox-notifn" style="font-family: 'Myriad Pro Regular';">
                            <ul>
                                <li>
                                    <p>You have <strong>{{ $User['new_message'] }}</strong> New Messages</p>
                                </li>
                            </ul>
                        </div>
                        <p style="font-family: 'Myriad Pro Regular';" class="seeinbx"> <a
                                class="text-decoration-none" style="color: #FF671D;" href="{{ route('get-messages') }}">
                                SEE
                                YOUR INBOX</a></p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="righthead ps-3">
                        <div class="row">
                            <div class="col-md-5">
                                <p class="brmetngs"><b>Your boardroom meetings</b></p>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Upcoming</option>
                                    <option value="1">Show All</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="showhidebtn text-end">
                                    <a class="text-decoration-none text-secondary h5" id="show"
                                        style="cursor: pointer;display:none;">Show</a>
                                    <a class="text-decoration-none text-secondary h5" id="hide"
                                        style="cursor: pointer;display:block;">Hide</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="showcontent">
                            @foreach ($bookings as $booking)
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-header-text">
                                            <ul>
                                                <li class="date">
                                                    {{ \Carbon\Carbon::parse($booking['sdate'])->format('M d, Y') }}</li>
                                                <li class="time">{{ $booking['shour'] }} -
                                                    {{ $booking['ehour'] }}
                                                </li>
                                                @if (strtotime($booking['sdate']) <= strtotime(date('Y/m/d')))
                                                    <li class="review-btn" style="margin-left:20rem; ">
                                                        <a href="{{ url('/review/add/' . $booking['listing_id']) }}">
                                                            <button class="btn btn-primary">Review Boardroom</button>
                                                        </a>
                                                    </li>
                                                @endif

                                            </ul>
                                        </div>
                                        <div class="card-status-wrapper">
                                            <div class="dropdown">
                                                <button class="btn" type="button" id="dropdownMenuButton1"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <img class="doticon"
                                                        src="https://hostdev2.justboardrooms.com/imgs/Ellipse-2.png" />
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item"
                                                            href="https://hostdev2.justboardrooms.com/booking/public/listing-details/{{ $booking['listing_id'] }}">View
                                                            Boardroom Listing</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Message Host</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Send E-mail Invite</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Add To Calendar</a>
                                                    </li>
                                                    <hr>
                                                    <li><a class="dropdown-item" href="#">Remove Booking</a>
                                                    </li>
                                                    {{-- <li><a class="db-remove dropdown-item" id="345">Remove</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://cmsdev.justboardrooms.com/api/listing/duplicate/345">Duplicate</a>
                                                </li> --}}
                                                </ul>
                                            </div>
                                            <div id="dialog-remove-confirm" title="Remove Listing?" style="display: none;">
                                                <p>Are you sure to remove this listing ?</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pb-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="list-img">
                                                    <img src="https://hostdev2.justboardrooms.com/Images/{{ $booking['boardroom_picture'] }}"
                                                        alt="" height="160" width="220;" class="rounded-3" />
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="list-dtl">
                                                    <p class="quen">{{ $booking['formatted_address'] }}</p>
                                                    <p class="torn">
                                                        {{ $booking['city'] }},{{ $booking['province'] }}
                                                        <br>Boardroom
                                                        name:
                                                        <b>{{ $booking['title'] }}</b>
                                                    </p>
                                                    <p class="metngid">Meeting ID:
                                                        {{ $booking['meeting_id'] == null ? 'XXXXX' : 'XXXXX' . $booking['meeting_id'] }}
                                                    </p>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Notes…"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div style="display: none;" class="hidecontent text-center py-3">
                            <p>You have no Meetings.</p>
                            <img src="imgs/faq-host.png" class="img-fluid" alt="find-boardroom" /> <br>
                            <a href="{{route('homepage')}}">FIND A BOARDROOM</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#customCheck1').on('click', function() {
                $('#agree-to-terms-modal').modal('show');
            });

            $('#hide').on('click', function() {
                $('.hidecontent').show();
                $('#show').show();
                $('#hide').hide();
                $('.showcontent').hide();
            });

            $('#show').on('click', function() {
                $('.hidecontent').hide();
                $('#hide').show();
                $('#show').hide();
                $('.showcontent').show();
            });

        })
    </script>
@endsection
