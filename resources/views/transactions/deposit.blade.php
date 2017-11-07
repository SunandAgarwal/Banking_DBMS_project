@extends('layouts.layout')

@section('content')
<div class="deposit">
	<form action="">
		{{ csrf_field() }}
			<label for="ifsc">IFSC Code</label>
			<input type="text" id="ifsc" name="ifsc">
			<label for="acc_no">Account Number</label>
			<input type="number" id="acc_no" name="acc_no">
			<label for="amount">Amount</label>
			<input type="number" id="amt" name="amt" step="0.01">
			<br><br>
			<button type="submit" class="btn btn-primary">Deposit</button>

	</form>
</div>
@endsection