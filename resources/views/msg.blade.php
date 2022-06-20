@extends('layouts.master')
@section('content')

{{-- eturn view('payment' ,compact('bookingdetails','listingDetails')); --}}



<div class="signedout-sucs py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-6 mx-auto">
				<div class="thanku-msg py-5 my-5">
					<h4 class="mb-5">Thank You for booking with Just Boardroom.</h4>	
					<p>Your boardroom is locked at</p>
					<div class="row mb-5">
						<div class="col-md-6">
							<p>{{$listingDetails['name']}}</p>
						</div>
						<div class="col-md-6">
							<p>{{date('F, j Y',strtotime($bookingdetails['startDate']))}}<br>{{$bookingdetails['startHour']}} - {{$bookingdetails['endHour']}}</p>
						</div>
					</div>
					<p>This has been added to your Dashboard</p>
					<center><a href="/booking/public/dashboard" class="btn btn-primary">GO TO MY DASHBOARD</a></center>
				</div>	
			</div>	
		</div>
	</div>
</div>
	


@endsection