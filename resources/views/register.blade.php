@extends('session.master')
  

@section('title')
  Register
@endsection

@section('content')
  <form method="POST" action="/register">
      {{ csrf_field() }}
        <h1>Register</h1>
        
          <legend><span class="number">1</span>Your basic info</legend>
          <input type="text" id="name" name="name" placeholder="Name">

          <input type="text" id="fname" name="fname" placeholder="Father's Name">
          
          <label for="dob">Date Of Birth:</label>
          <input type="date" name="dob" placeholder="Date of Birth">

          <input type="number" id="age" name="age" placeholder="Age">
          
          <label for="gender">Gender:</label>
          <input type="radio" name="gender" value="M">Male &nbsp;&nbsp;&nbsp;
          <input type="radio" name="gender" value="F">Female &nbsp;&nbsp;&nbsp;
          <input type="radio" name="gender" value="O">Other

          <br>
          <br>
          
          <legend><span class="number">2</span>Your Account Details</legend>
          <input type="email" id="email" name="email" placeholder="Email">
          
          <input type="password" id="password" name="password" placeholder="Password">

          <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
          
          <input type="number" id="aadhar_no" name="aadhar_no" placeholder="Aadhar Number">

          <legend><span class="number">3</span>Your Address</legend>
          <input type="text" id="street" name="street" placeholder="Street">
          <input type="text" id="city" name="city" placeholder="City">
          <input type="text" id="state" name="state" placeholder="State">
          <input type="number" id="pin" name="pin" placeholder="PIN Code">
          
          <label for="user">I am a : </label>
          <input type="radio" name="user" id="user" value="customer">Customer &nbsp; &nbsp; &nbsp;
          <input type="radio" name="user" id="user" value="employee">Employee &nbsp; &nbsp; &nbsp;

          <br>
          <br>
        
        <button type="submit">Create My Account</button>
  </form>
@endsection
