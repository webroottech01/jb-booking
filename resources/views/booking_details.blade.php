@extends('layouts.master')
@section('content')

<div class="booking-detail py-4">
	<div class="container">
		<h1 class="header">Booking Details</h1>
		<div class="row">
			<div class="col-md-6">
				<img src="{{ asset('imgs/benjamin-child.jpg')}}" class="img-fluid" />
				<section class="address position-relative py-3">              
                    <p class="locnm">2216 Queen St. E</p>                                  
                    <p class="tornt">Toronto, ON</p>
                    <p class="bechs">The Great Beaches Building</p>
					<p class="locnm">Boardroom name: <b>Hermosa</b></p>                          
                </section>
			</div>
			<div class="col-md-6">
				<section class="payment-card">                          
					<p class="date">Sep 22, 2021</p>
					<p class="hours">
						2 hours <br/>
						10:00 AM - 12:00 PM
					</p>
					<div class="cost">					
						<div class="row justify-content-between">
							<div class="col-md-3">
								<p class="mb-0">Cost</p>
							</div>
							<div class="col-md-3">
								<ul class="mb-0">
									<li>CAD</li>
									<li><img src="{{ asset('imgs/cad-flag.jpg')}}" class="img-fluid"/></li>
								</ul>
							</div>
						</div>					
                    </div>													
                    <ul class="hrs">
						<li>2 hours (10:00 AM - 12:00 PM)<br> September 22, 2021</li>
						<li>$100.00</li>
					</ul>
					<ul class="discnt">
						<li>Discount 15%</li>
						<li>- $15.00</li>
					</ul>
					<ul class="hst">
						<li>HST</li>
						<li>$11.05</li>
					</ul>
					<hr>
					<ul class="totlcost">
						<li><strong>Total</strong></li>
						<li><strong>$96.05</strong></li>
					</ul>
					<p class="paradetail">By continuing, you agree to Just Boardrooms’ <b>Terms of Service</b> and <b>Privacy Policy</b>.<br><br> If this is your first time booking with this card, a $250 pre-authorization will be placed on your credit card to ensure its validity for incidentals.<br><br> When making a booking, you can always cancel up to 2 hours prior to your booking. Please see our <b>Cancellation Policy</b> for further details.</p>
                    <button type="button" class="btn btn-primary">PAYMENT</button>
                </section>
			</div>
		</div>
	</div>
</div>	

@endsection