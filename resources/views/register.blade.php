@extends('session.master')
  

@section('title')
  Register
@endsection

@section('content')
  <form method="POST" action="/register">
      {{ csrf_field() }}
      @include ('errors.errors')
      
        <h1>Register</h1>
        
          <legend><span class="number">1</span>Your Basic Info:</legend>
          <input type="text" id="name" name="name" placeholder="Name" required>

          <input type="text" id="fname" name="fname" placeholder="Father's Name" required>
          
          <label for="dob">Date Of Birth:</label>
          <input type="date" name="dob" placeholder="Date of Birth" required>

          <input type="number" id="phone1" name="phone[]" placeholder="Contact Number 1" required>
          <input type="number" id="phone2" name="phone[]" placeholder="Contact Number 2">
          <input type="number" id="phone3" name="phone[]" placeholder="Contact Number 3">

          <label for="gender">Gender:</label>
          <input type="radio" name="gender" value="M">Male &nbsp;&nbsp;&nbsp;
          <input type="radio" name="gender" value="F">Female &nbsp;&nbsp;&nbsp;
          <input type="radio" name="gender" value="O">Other

          <br>
          <br>
          
          <legend><span class="number">2</span>Your Account Details:</legend>
          <input type="email" id="email" name="email" placeholder="Email">
          
          <input type="password" id="password" name="password" placeholder="Password">

          <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
          
          <input type="number" id="aadhar_no" name="aadhar_no" placeholder="Aadhar Number">

          <legend><span class="number">3</span>Your Address:</legend>
          <input type="text" id="street" name="street" placeholder="Street">
          <input type="text" id="city" name="city" placeholder="City">
          <input type="text" id="state" name="state" placeholder="State">
          <input type="number" id="pin" name="pin" placeholder="PIN Code" required>
          
          <label for="user">I am a : </label>
          <input type="radio" name="user" id="user" value="customer">Customer &nbsp; &nbsp; &nbsp;
          <input type="radio" name="user" id="user" value="employee">Employee &nbsp; &nbsp; &nbsp;

          <br>
          <br>
          Designation:
          <select id="designation" name="designation">
            <option value="Manager">Manager</option>
            <option value="Probationary Officer">Probationary Officer</option>
            <option value="Specialist Officer">Specialist Officer</option>
            <option value="Office Assistant">Office Assistant</option>
          </select>

          <legend><span class="number">4</span>Your Account Info:</legend>
          <input type="text" id="type" name="type" placeholder="(Savings/Current/Joint/Employee Account)" required>
          <input type="number" id="account_number" name="account_number" placeholder="Joint Account Number">

          <input type="hidden" id="issue_cheque" name="issue_cheque" value="0" />
          <input type="checkbox" id="issue_cheque" name="issue_cheque" value="1">Issue Chequebook

          <br>
          <br>
        
        <button type="submit">Create My Account</button>
  </form>
@endsection
