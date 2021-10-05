<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Amar online school</title>
	<link  rel="icon" href="{{ asset('public/frontEnd') }}/assets/images/logo/amaronlineschool.png" type="image/x-icon" >
	<link href="https://fonts.maateen.me/charukola-ultra-light/font.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/frontEnd') }}/assets/css/style-starter.css">
	<link href="https://fonts.maateen.me/charu-chandan-3d/font.css" rel="stylesheet">

    <style> 
    .home_item_menu li a:hover{
        background: #323332;
        padding:10px 5px;
        margin:5px;
        border-radius: 5px;
    }
    .home_item:hover{
        color:white !important;
    }
    </style>
</head>

<body>
		


@yield('content')


{{-- <button onclick="topFunction()" id="movetop" title="Go to top">
	&#10548;
</button> --}}
<script src="{{ asset('public/frontEnd') }}/assets/js/scroll.js"> </script>
<script src="{{ asset('public/frontEnd') }}/assets/js/jquery-3.3.1.min.js"></script> 

<script src="{{ asset('public/frontEnd') }}/assets/js/theme-change.js"></script><!--  (light and dark)-->

<script src="{{ asset('public/frontEnd') }}/assets/js/owl.carousel.js"></script>
<!-- script for banner slider-->
<script>
	$(document).ready(function () {
		$('.owl-one').owlCarousel({
			loop: true,
			margin: 0,
			nav: false,
			responsiveClass: true,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplaySpeed: 1000,
			autoplayHoverPause: false,
			responsive: {
				0: {
					items: 1,
					nav: false
				},
				480: {
					items: 1,
					nav: false
				},
				667: {
					items: 1,
					nav: true
				},
				1000: {
					items: 1,
					nav: true
				}
			}
		})
	})
</script>
<script src="{{ asset('public/frontEnd') }}/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('public/frontEnd') }}/assets/js/menual.js"></script>
<script src="{{ asset('public/frontEnd') }}/assets/js/counter.js"></script>

<script>
	$(function () {
		$('.navbar-toggler').click(function () {
			$('body').toggleClass('noscroll');
		})
	});
</script>
<script src="{{ asset('public/frontEnd') }}/assets/js/bootstrap.min.js"></script>
<!-- //bootstrap-->

</body>

</html>