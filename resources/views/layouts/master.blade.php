<!DOCTYPE html>
<html>
<head>
	<title>
        @yield('title', 'Bill Calculator')
    </title>

	<meta charset='utf-8'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href='/css/style.css' rel='stylesheet'>

        @stack('head')
</head>
	
<body>



	
	<div class="container">
		<div class="col-md-8">
		
		<header>
			<img
			src='http://making-the-internet.s3.amazonaws.com/laravel-foobooks-logo@2x.png'
			style='width:300px'
			alt='Foobooks Logo'>
		</header>
	
		<section>
			@yield('content')
		</section>

	
		<footer>
			&copy; {{ date('Y') }}
		</footer>
	
		</div>
	</div>
		


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @stack('body')

</body>
</html>