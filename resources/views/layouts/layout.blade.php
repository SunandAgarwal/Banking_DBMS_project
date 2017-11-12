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
    	button {
    		cursor: pointer;
    		width: 120px;
    	}
    	input[type=text], input[type=number] {
	    width: 100%;
	    padding: 12px 20px;
	    margin: 8px 0;
	    display: inline-block;
	    border: 3px solid #ccc;
	    border-radius: 4px;
	    box-sizing: border-box;
	    -webkit-transition: 0.3s;
	    transition: 0.3s;
	    outline: none;
		}
		input[type=text]:focus, input[type=number]:focus {
		    border: 3px solid #555;
		}

		input[type=submit] {
		    width: 100%;
		    background-color: #4CAF50;
		    color: white;
		    padding: 14px 20px;
		    margin: 8px 0;
		    border: none;
		    border-radius: 4px;
		    cursor: pointer;
		}

		input[type=submit]:hover {
		    background-color: #45a049;
		}

		.deposit, .send {
		    border-radius: 5px;
		    background-color: #f2f2f2;
		    padding: 20px;
		}
    </style>
  

</head>
<body>
	<!-- navbar -->
	@include ('layouts.nav')
	
	<div class="container">
		@yield('content')
	</div>

	<div class="footer">
		@yield ('footer')
	</div>
</body>
</html>