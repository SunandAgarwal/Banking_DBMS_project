@extends('layouts.layout')

@section('content')
<div class="deposit">
	<form action="/home" method="POST">
		{{ csrf_field() }}
			<label for="acc_no">Account Number</label>
			<select class="form-control" name="account_number" required>
			<option value="" selected disabled hidden>Select</option>
			  <option value="{{ $account_number }}">{{ $account_number }}</option>
			</select>
			<label for="amount">Amount</label>
			<input type="number" id="amt" name="amt" step="0.01" required>
			<br><br>
			<button type="submit" class="btn btn-primary">Deposit</button>

	</form>
</div>
@endsection