@extends('layouts.master')
@section('content')
<style>
    .bd-img{
        width: 100%;
        height: 335px;
    }


</style>
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 660px;">
        <div class="modal-content">
            <div class="modal-body">

                <p class="text-end mb-0"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></p>

                <section class="requestmodal payment-methods1">
                        <!-- First Modal Start -->
                                <div class="first-section">

                                    <div class="card-body" style="padding-right:7em;">
                                        <h2 class="card-title pb-4" style="font-family:Myriad Pro Bold">Payment Methods</h2>
                                        <ul class="pymntproces">
                                            <li class="pymntcard"><img src="imgs/visa.jpg" class="img-fluid" alt="build" /></li>
                                            <li class="cardnmbr">**** **** **** 1234</li>
                                            <li class="selectopnt">SELECT</li>
                                            <li class="removeopnt">REMOVE</li>
                                        </ul>
                                        <ul class="pymntproces">
                                            <li class="pymntcard"><img src="imgs/visa.jpg" class="img-fluid" alt="build" /></li>
                                            <li class="cardnmbr">**** **** **** 1234</li>
                                            <li class="selectopnt">SELECT</li>
                                            <li class="removeopnt">REMOVE</li>
                                        </ul>
                                        <p class="otheoptn"><b>OTHER OPTIONS</b></p>
                                        <ul class="usecard pb-2">
                                            <li><span style="color:#FF671D;">Credit Card</span> for this one-time use</li>
                                            <li><span style="color:#FF671D;">Add a Card</span> for this and future use</li>
                                        </ul>
                                    </div>	
                                    <div class="card-footer bg-transparent">
                                        <ul class="accepted-card">
                                            <li><img src="imgs/visa.jpg" class="img-fluid" alt="build" /></li>
                                            <li><img src="imgs/mc.jpg" class="img-fluid" alt="build" /></li>
                                            <li><img src="imgs/amex.jpg" class="img-fluid" alt="build" /></li>
                                            <li>accepted</li>
                                        </ul>
                                    </div>
                                </div>	
                                <!-- First Modal End -->
                                <!-- Second Modal Start -->
                                <div class="addcard p-3 second-section" style="display:none;">
                    <div class="">
                        <form role="form" action="{{ route('paymentDeduct')}}"
                            method="post" class="require-validation" data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                            @csrf
							<input type="hidden" name="totalAmount" value="{{ $request['calculate_rate'] }}">
							<input type="hidden" value="{{$request['listingId']}}" name="listingId">
							<input type="hidden" value="{{$request['startHour']}}" name="startHour">
							<input type="hidden" value="{{$request['endHour']}}" name="endHour">
							<input type="hidden" value="{{$request['listingType']}}" name="listingType">
							<input type="hidden" value="{{$request['listingUserId']}}" name="listingUserId">
							<input type="hidden" value="{{$request['hourDiff']}}" name="hourDiff">
							<input type="hidden" value="{{$request['endDate']}}" name="endDate">
							<input type="hidden" value="{{$request['startDate']}}" name="startDate">
							<input type="hidden" value="{{Session::get('userId')}}" name="loggedInUser">


                            <div class="card-body">
                                <h2 class="card-title">Add a Card</h2>
                                <ul class="accepted-card">

                                    <li><img src="/booking/public/imgs/visa.jpg" class="img-fluid" alt="build" /></li>
                                    <li><img src="/booking/public/imgs/mc.jpg" class="img-fluid" alt="build" /></li>
                                    <li><img src="/booking/public/imgs/amex.jpg" class="img-fluid" alt="build" /></li>
                                    <li>accepted</li>
                                </ul>
                                <h2 class="price mt-4">${{ $request['calculate_rate'] }}</h3>
                                    <div class="inputgroup">
                                        <label for="input" class="col-form-label">Name on card</label>
                                        <input type="text" aria-label="name on card" class="form-control">
                                        <div class="row my-4">
                                            <div class="col-md-6">
                                                <label for="input" class="col-form-label">Card number</label>
                                                <input type="text" aria-label="card number"
                                                    class="form-control card-number">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="input" class="col-form-label">Expiration</label>
                                                <select class="form-select date card-expiry-month"
                                                    aria-label="Default select example">

                                                    @for($i = 1; $i <= 12; $i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                                <select class="form-select year card-expiry-year"
                                                    aria-label="Default select example">
                                                    @for ($i = 2022; $i < 2035; $i++)
                                                     <option  value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="input" class="col-form-label">CVV</label>
                                                <input type="text" aria-label="cvv" class="form-control card-cvc">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center my-5">
                                        {{-- <!-- <a href="/booking/public/api/msg"> --> --}}
                                        <button type="submit" class="btn btn-primary">SUBMIT PAYMENT</button>
                                        {{-- <!-- </a> --> --}}
                                    </div>
                            </div>
                        
						</form>
                    </div>
                </div>
                                <!-- Second Modal End -->
                </section>
            </div>
        </div>
    </div>
</div>
<div class="booking-detail py-4">
	<div class="container">
		<h1 class="header">Booking Details</h1>
		<div class="row">
			<div class="col-md-6">
				<img src="https://hostdev2.justboardrooms.com/Images/{{$listing['picture']}}" class="img-fluid bd-img" />
				<section class="address position-relative py-3">              
                    <p class="locnm">{{$listing['address']['formatted_address']}}</p>                                  
                    <p class="tornt">{{$listing['address']['city']}}, {{$listing['address']['province']}}</p>
                    <p class="bechs">{{$listing['address']['building_name']}}</p>
					<p class="locnm">Boardroom name: <b>{{$listing['name']}}</b></p>                          
                </section>
			</div>
			<div class="col-md-6">
				<section class="payment-card">                          
					<p class="date">{{\Carbon\Carbon::parse(Session::get('startdate'))->format('M d, Y') }}</p>
					<p class="hours mb-5">
						{{$hourdiff}} hours <br/>
						{{ date("g:i a", strtotime($request->startHour)) }} - {{ date("g:i a", strtotime($request->endHour)) }}
					</p>
					<div class="cost">					
						<div class="row justify-content-between">
							<div class="col-md-3">
								<p class="mb-0">Cost</p>
							</div>
							<div class="col-md-2">
								<ul class="mb-0">
									<li>{{$listing['currency']}}</li>
									<li><img src="{{ asset(($listing['currency'] == 'USD') ? 'imgs/usd-flag.jpg' : 'imgs/cad-flag.jpg') }}" style="max-width:35px;" class="img-fluid"/></li>
								</ul>
							</div>
						</div>					
                    </div>													
                    <ul class="hrs">
						<li>{{$hourdiff}} hours ({{ date("g:i a", strtotime($request->startHour)) }} - {{ date("g:i a", strtotime($request->endHour)) }})<br> {{\Carbon\Carbon::parse(Session::get('startdate'))->format('M d, Y') }}</li>
						<li>${{ $request['calculate_rate'] }}</li>
					</ul>
					<ul class="discnt">
						<li>Discount {{Session::get('discount')}}%</li>
						<li>- ${{ Session::get('discountPrice')}}</li>
					</ul>
					<ul class="hst">
						<li>HST</li>
						<li>$0</li>
					</ul>
					<hr>
					<ul class="totlcost">
						<li><strong>Total</strong></li>
						<li><strong>${{ Session::get('totalPrice') }}</strong></li>
					</ul>
					<p class="paradetail">By continuing, you agree to Just Boardrooms’ <b>Terms of Service</b> and <b>Privacy Policy</b>.<br><br> If this is your first time booking with this card, a $250 pre-authorization will be placed on your credit card to ensure its validity for incidentals.<br><br> When making a booking, you can always cancel up to 2 hours prior to your booking. Please see our <b>Cancellation Policy</b> for further details.</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal">PAYMENT</button>
                </section>
			</div>
		</div>
	</div>
</div>	

<!-- <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
            </div>
        </div>
    </div> -->
  
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    // / token contains id, last4, and card type /
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });

        function updateScreen(){
            $('.first-section').hide();
            $('.second-section').show();
        }
    </script>
@endsection
