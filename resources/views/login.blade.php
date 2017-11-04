@extends('session.master')
  

@section('title')
  Login
@endsection

@section('content')
  <form>

  {{ csrf_field() }}
      
        <h1>Login</h1>
        
            <input type="email" id="mail" name="user_email" placeholder="Email">
            
            <input type="password" id="password" name="user_password" placeholder="Password">
          
        <button class="btn btn-success btn-block">Let Me In</button>
  </form>
@endsection