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
	{{ HTML::style('assets/css/pikaday.css') }}

	{{ HTML::script('assets/js/moment.min.js') }}
	{{ HTML::script('assets/js/pikaday.js') }}
	
</head>
<body>
	<div class="wrap">
		<header>
			@yield('header')
		</header>
		<nav class="pure-menu pure-menu-open pure-menu-horizontal">
			<ul id="navlist">
				<li class="{{ Request::is( 'students*') ? 'pure-menu-selected' : '' }}"><a href="{{ URL::to( 'students') }}">Students</a></li>
				<li class="{{ Request::is( 'years*') ? 'pure-menu-selected' : '' }}"><a href="{{ URL::to( 'years') }}">Years</a></li>
				<li class="{{ Request::is( 'skills*') ? 'pure-menu-selected' : '' }}"><a href="{{ URL::to( 'skills') }}">Skills</a></li>
			</ul>	
		</nav>
		@if(Session::has('message'))
			<p style="color: green;">{{ Session::get('message') }}</p>
		@endif
		<div class="content">
			@yield('content')
		</div>
	</div>

	<script>
        var picker = new Pikaday({
        field: document.getElementById('birthday'),
        format: 'YYYY-MM-DD',
        yearRange: [1965,2013]
        // onSelect: function() {
        //     console.log(this.getMoment().format('YYYY-MM-DD'));
        // }
    });
    </script>
	
</body>
</html>