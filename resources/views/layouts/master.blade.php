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

		<!---CSS link 
        <link rel="stylesheet" type="text/css" href="https://hostdev2.justboardrooms.com/booking/public/css/nw-justboardrooms_style.css">
        <link rel="stylesheet" type="text/css" href="https://hostdev2.justboardrooms.com/booking/public/css/custom.css">-->
	<link rel="stylesheet" type="text/css" href="https://beta.justboardrooms.com/booking/public/css/nw-justboardrooms_style.css">
        <link rel="stylesheet" type="text/css" href="https://beta.justboardrooms.com/booking/public/css/custom.css"


		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/> -->

		<!-- favicon -->
		<link rel="icon" href="{{ asset('imgs/jbrfavicon.png') }}">

</head>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<body>
	<style>
		i.fa.fa-heart.active, i.fa.fa-heart-o.active {
			color: red;
		}
	</style>

<div class="main">
@include('layouts.header')
<div class="jb-main">
    @yield('content')
</div>
<script>
	function fakeSave(bid,oClass = false){
        currEl = $('.tolikes'+bid).children('i');
        if(currEl.hasClass('active')){
			if(oClass == true){
				currEl.removeClass('fa-heart');
				currEl.addClass('fa-heart-o');
			}
            currEl.removeClass('active');
        }else{
			if(oClass == true){
				currEl.removeClass('fa-heart-o');
				currEl.addClass('fa-heart');
			}
            currEl.addClass('active');
        }
    }
</script>
@include('layouts.footer')
</body>
</html>


