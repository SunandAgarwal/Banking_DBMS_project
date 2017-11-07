<!-- Custom css for navbar -->
<link href="/css/nav.css" rel="stylesheet">	

<header>
	<div class="blog-masthead">
	  <div class="container">
	    <nav class="nav">
	      <a class="nav-link active" href="/homepage">Home</a>
	      @if(Auth::check())
		      	<a class="nav-link" href="#">{{ Auth::user()->name }} </a>
		      	<a class="nav-link ml-auto" href="/logout">Logout</a>
	      @endif 
	    </nav>
	  </div>
	</div>
</header>