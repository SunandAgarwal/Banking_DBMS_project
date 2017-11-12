@extends('layouts.layout')

@section('content')
	@include('errors.errors')
	<div class="send">
		<form action="/send" method="POST">
			{{ csrf_field() }}

			<label for="acc_no">Your Account Number</label>
			<select class="form-control" name="account_number" required>
			<option value="" selected disabled hidden>Select</option>
			  <option value="{{ $account_number }}">{{ $account_number }}</option>
			</select>
			<br>
			<label for="b_name">Beneficiary Name</label>
			<input type="text" id="beneficiary_name" name="beneficiary_name" required>
			<br>
			<label for="b_acc_no">Beneficiary Account Number</label>
			<input type="number" id="beneficiary_account_number" name="beneficiary_account_number" required>
			<label for="amount">Amount</label>
			<input type="number" id="amt" name="amt" step="0.01" required>
			<br><br>
			<button type="submit" class="btn btn-primary">Send</button>
		</form>
	</div>
@endsection