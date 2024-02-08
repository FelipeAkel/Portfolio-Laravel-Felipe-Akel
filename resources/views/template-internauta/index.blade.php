<!DOCTYPE html>
<html lang="pt-br">

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<meta name="description" content="Name of your web site">
	<meta name="author" content="Marketify">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>Portfólio Felipe Akel - PFA</title>

	<link
		href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="{{ asset('template-internauta/css/plugins.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('template-internauta/css/dark.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('template-internauta/css/style.css') }}" />

	<!-- SCRIPTS -->
	<script src="{{ asset('template-internauta/js/jquery.js') }}" defer></script>
	<script src="{{ asset('template-internauta/js/plugins.js') }}" defer></script>
	<script src="{{ asset('template-internauta/js/init.js') }}" defer> defer</script>
	<!-- /SCRIPTS -->

</head>

<body class="dark"> 
	
	<!-- PRELOADER -->
	{{-- <div id="preloader">
		<div class="loader_line"></div>
	</div> --}}
	<!-- /PRELOADER -->
	
<!-- WRAPPER ALL -->
<div class="iknow_tm_all_wrap" data-magic-cursor="show"> <!-- If you want disable magic cursor change value to "hide" -->	
	
	<!-- MODALBOX -->
	<div class="iknow_tm_modalbox">
		<div class="box_inner">
			<div class="close">
				<a href="#"><img class="svg" src="{{ asset('template-internauta/img/') }}/svg/cancel.svg" alt="" /></a>
			</div>
			<div class="description_wrap"></div>
		</div>
	</div>
	<!-- /MODALBOX -->
		
	@include('template-internauta.layout.includes.topbar')
	
	<!-- HERO -->
	<div class="iknow_tm_hero">
		<div class="background_shape"></div>
		<div class="hero_content">
			<div class="container">
				<div class="content_inner">
					<div class="main_info">
						<div class="left">
							<span class="subtitle">Olá, Eu sou</span>
							<h3 class="name">Felipe Akel</h3>
							<p class="text">Programador PHP | Laravel</p>
							<div class="iknow_tm_video">
								<div class="video_inner">
									<div class="circle"></div>
									<h3 class="play">Play Video</h3>
									<a class="iknow_tm_full_link popup-youtube" href="https://www.youtube.com/watch?v=7e90gBu4pas"></a>
								</div>
							</div>
						</div>
						<div class="right">
							<div class="image">
								<img src="{{ asset('template-internauta/img/') }}/thumbs/47-60.jpg" alt="" />
								<div class="main" data-img-url="{{ asset('template-internauta/img/about/felipe-akel.jpg') }}"></div>
							</div>
						</div>
					</div>
					
					@include('template-internauta.layout.includes.menu')

				</div>
			</div>
		</div>
		
		@include('template-internauta.layout.includes.hero-shapes')
		
	</div>
	<!-- /HERO -->
	
	<!-- MAINPART -->
	<div class="container">
		<div class="iknow_tm_mainpart">
	
			@include('template-internauta.layout.about')
			
			@include('template-internauta.layout.resume')
			
			@include('template-internauta.layout.portfolio')
			
			@include('template-internauta.layout.service')
			
			@include('template-internauta.layout.testimonials')
			
			@include('template-internauta.layout.blog')
			
			@include('template-internauta.layout.contact')

		</div>
	</div>
	<!-- /MAINPART -->
	
	{{-- FOOTER --}}
	@include('template-internauta.layout.includes.footer')
	{{-- /FOOTER --}}
	
	<!-- MAGIC CURSOR -->
	<div class="mouse-cursor cursor-outer"></div>
	<div class="mouse-cursor cursor-inner"></div>
	<!-- /MAGIC CURSOR -->
	
</div>
<!-- / WRAPPER ALL -->
	

</body>

</html>