<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Bootstrap core CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <!-- Custom css for navbar -->
  <link href="/css/nav.css" rel="stylesheet">


</head>
<body>
	<!-- navbar -->
	<header>
		<div class="blog-masthead">
		  <div class="container">
		    <nav class="nav">
		      <a class="nav-link active" href="#">Home</a>
		      <a class="nav-link" href="#">@yield('name')</a>
		      <a class="nav-link ml-auto" href="#">Logout</a>
		    </nav>
		  </div>
		</div>
	</header>
	
	<div class="container">
		@yield('content')
	</div>

	<div class="footer">
		
	</div>
</body>
</html>