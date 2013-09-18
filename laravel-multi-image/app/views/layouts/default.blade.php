<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title }}</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="author" content="The Chopping Block, Inc." />
	<meta name="geo.country" content="US" />
	<meta name="dc.language" content="en" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	
	{{ HTML::style('assets/css/pure/pure-min.css') }}
	{{ HTML::style('assets/css/styles.css') }}
	{{ HTML::style('assets/css/basic.css') }}

	{{ HTML::script('assets/js/dropzone.min.js') }}

	
</head>
<body>
	<div class="wrap">
		<header>
			@yield('header')
		</header>
		<nav class="pure-menu pure-menu-open pure-menu-horizontal">
			<ul id="navlist">
				<li class="{{ Request::is( 'images*') ? 'pure-menu-selected' : '' }}"><a href="{{ URL::to( 'images') }}">Images</a></li>
				<li class="{{ Request::is( 'sets*') ? 'pure-menu-selected' : '' }}"><a href="{{ URL::to( 'sets') }}">Sets</a></li>
			</ul>	
		</nav>
		@if(Session::has('message'))
			<p style="color: green;">{{ Session::get('message') }}</p>
		@endif
		<div class="content">
			@yield('content')
		</div>
	</div>
	
</body>
</html>