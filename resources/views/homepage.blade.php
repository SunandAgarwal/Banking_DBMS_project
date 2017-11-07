<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
   	<!-- Bootstrap core CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <style>
    	.button {
    		position: absolute;
			top : 50%;
			left: 50%;
			transform: translate(-50%, -50%);
    	}
    	button {
    		width: 450px;
    		height: 75px;
    		opacity: 0.8;
    	}
    	button:hover {
    		opacity:1;
    		cursor: pointer;
    	}
    	html {
		    background: url(/bank.jpg) no-repeat center fixed; 
		    background-size: cover;
		}
    </style>
  

</head>
<body>
	
	<div class="container">
	<div class="button">
		<button class="btn btn-primary btn-lg" onclick="window.location.href='/login'">
			Login
		</button>
		<br><br><br>
		<button class="btn btn-primary btn-lg" onclick="window.location.href='/register'">
			Create an Account
		</button>
	</div>
	</div>

</body>
</html>
	