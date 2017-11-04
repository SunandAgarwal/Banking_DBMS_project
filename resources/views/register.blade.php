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

          <input type="number" id="phone1" name="phone[]" placeholder="Contact Number 1">
          <input type="number" id="phone2" name="phone[]" placeholder="Contact Number 2">
          <input type="number" id="phone3" name="phone[]" placeholder="Contact Number 3">

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
          Designation:
          <select id="designation" name="designation">
            <option value="ma">Manager</option>
            <option value="po">Probationary Officer</option>
            <option value="so">Specialist Officer</option>
            <option value="oa">Office Assistant</option>
          </select>

          <legend><span class="number">4</span>Your Account Info : </legend>
          <input type="text" id="type" name="type" placeholder="(Savings/Current/Joint)">
          <input type="number" id="account_number" name="account_number" placeholder="Joint Account Number">
          <input type="checkbox" id="issue_cheque" name="issue_cheque" value="1">Issue Chequebook

          <br>
          <br>
        
        <button type="submit">Create My Account</button>
  </form>
@endsection
