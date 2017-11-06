<!-- Custom css for navbar -->
<link href="/css/nav.css" rel="stylesheet">	

<header>
	<div class="blog-masthead">
	  <div class="container">
	    <nav class="nav">
	      <a class="nav-link active" href="#">Home</a>
	      @if(Auth::check())
	      	<a class="nav-link" href="#">{{ Auth::user()->name }}</a>
	      	<button id ="logout" class="btn btn-link ml-auto" href="/logout" method="post" type="submit">Logout</button>
	      @endif	    
	    </nav>
	  </div>
	</div>
</header>