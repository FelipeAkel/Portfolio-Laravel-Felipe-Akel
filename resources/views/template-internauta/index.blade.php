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
	<link rel="stylesheet" type="text/css" href="{{ asset('template-internauta/css/custom.css') }}">

	{{-- ICONS --}}
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

	{{-- Toastr --}}
	<link rel="stylesheet" href="{{ asset('template-admin/toastr/toastr.css') }}">

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
							<span class="subtitle">Hello World, eu sou</span>
							<h3 class="name">{{ $sobreMim->no_usuario_portfolio }}</h3>
							<p class="text">{{ $sobreMim->ds_funcao }}</p>
							<div class="iknow_tm_video">
								<div class="video_inner">
									<div class="circle">
										<a href="{{ $sobreMim->ds_url_linkedin }}" target="_blank">
											<img src="{{ asset('template-internauta/img/') }}/svg/social/linkedin-q.svg" alt="Logo Linkedin" />
										</a>
									</div>
									<div class="circle p-ml-10">
										<a href="{{ $sobreMim->ds_url_github }}" target="_blank">
											<img src="{{ asset('template-internauta/img/') }}/svg/social/github-q.svg" alt="Logo GitHub" />
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="right">
							<div class="image">
								<img src="{{ asset('template-internauta/img/') }}/thumbs/47-60.jpg" alt="" />
								<div class="main" data-img-url="{{ asset('storage/') }}/{{ $sobreMim->ds_url_foto_usuario }}"></div>
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
	
	{{-- Ao colocar no head-js, compoente não funciona! --}}
    <script src="{{ asset('template-admin/toastr/jquery.js') }}" ></script>
    <script src="{{ asset('template-admin/toastr/toastr.js') }}"></script>
    {!! Toastr::message() !!}
</div>
<!-- / WRAPPER ALL -->

</body>

</html>