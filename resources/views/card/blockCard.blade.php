@extends('layouts.layout')

@section('content')
	<form action="/block_card" method="POST">
			{{ csrf_field() }}
				<label for="card_no">Card Number</label>
				<select class="form-control" name="card_no" required>
				<option value="" selected disabled hidden>Select</option>
				  <option value="{{ $card_info->Card_No }}">{{ $card_info->Card_No }}   </option>
				</select>
				<br><br>
				<label for="account_number">Account Number</label>
				<select class="form-control" name="account_number" required>
				<option value="" selected disabled hidden>Select</option>
				  <option value="{{ $card_info->Account_Number }}">{{ $card_info->Account_Number }}   </option>
				</select>
				<br><br>
				<button type="submit" class="btn btn-primary">Block</button>
		</form>
@endsection