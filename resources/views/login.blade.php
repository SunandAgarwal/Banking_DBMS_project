@extends('session.master')
  

@section('title')
  Login
@endsection

@section('content')
  <form method="POST" action="/login">
      {{ csrf_field() }}
        <h1>Login</h1>
        
            <input type="email" id="mail" name="email" placeholder="Email">
            
            <input type="password" id="password" name="password" placeholder="Password">
          
        <button type = "submit" class="btn btn-success btn-block">Let Me In</button>
        <br><br>
        @include('errors.errors')
  </form>
@endsection