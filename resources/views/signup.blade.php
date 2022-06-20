@extends('layouts.master')
@section('content')
<div class="container-fluid py-5">	
	<div class="row justify-content-center">
		<div class="col-md-5">
			<section class="loginpg signuppg">	
				<div class="card">  
					<div class="card-body">						
						<h4 class="login-title text-center">Create Account</h4>
						<div class="pt-3 pb-3 text-center">
							
							<input type="hidden" name="_token" value="0FGYcLIrx4On4bq2250MGT2X3R8hVy50oIB7WAEs" />
							
							<div class="row mb-3">
								<div class="col-md-6">
									<div class="py-2">
										<input type="text" class="form-control" placeholder="First Name" id="firstname" name="namelist"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="py-2">
										<input type="text" class="form-control" placeholder="Last Name" id="lastname" name="namelist"/>
									</div>
								</div>										
							</div>
							
							<div class="row mb-3">
								<div class="py-2">
									<input type="email" class="form-control" placeholder="Email" id="email" name="emaillist"/>
								</div>
							</div>

							<div class="row mb-3">
								<div class="py-2">
									<input type="password" class="form-control" placeholder="Password" id="pwd" name="pwd"/>
									<!-- <i class="fa fa-eye-slash" aria-hidden="true"></i> -->
								</div>
							</div>
							<div class="row align-items-center mb-4">								
								<div class="col-md-12">
									<div class="py-3">
										<button id="btn-register" class="btn btn-jb col-12 p-2">NEXT</button>
									</div>
								</div>
							</div>
							
							<div class="login-footer">
								<div class="row mx-auto mt-4">
									<div class="col-md-7">
										<p class="text-white m-0">Already have an account?</p>
									</div>
									<div class="col-md-5">
										 <a class="btn btn-sign-up btn-register"
                                                    href="{{ route('loginGuest') }}">{{ __('LOGIN') }}</a>
									</div>
								</div>	
							</div>
						</div>
                    </div>
                </div>
			</section>
		</div>	
	</div>	
</div>	


<script>
	$(document).ready(function(){
		$('#btn-register').on('click', function() {
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var email = $('#email').val();
            var password = $('#pwd').val();
			console.log(firstname,lastname,email,password);
			var error = 0 ;
			if(firstname == ''){
				alert('Firstname is required');
				error++;
			}else if(lastname == ''){
				alert('Lastname is required');
				error++;
			}else if(email == ''){
				alert('Email is required');
				error++;
			}else if(password == ''){
				alert('Password is required');
				error++;
			}
			
			if(error == 0){
				$.ajax({
                url: "{{ route('registerGuestApi')}}",
                type: 'post',
                data: {
                	_token:'{{csrf_token()}}',
                    email: email,
                    password: password,
                    first_name:firstname,
                    last_name:lastname
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    window.location.href = "{{ route('homepage') }}";

                },
                error: function(data) {
                    console.log("Problem");
                }
            });
			}
            
        });
	});
</script>


@endsection