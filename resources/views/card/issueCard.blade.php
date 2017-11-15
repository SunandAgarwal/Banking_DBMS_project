@extends('layouts.layout')

@section('content')
	<form action="/issue_card" method="POST">
			{{ csrf_field() }}
				<label for="type">Type of Card</label>
				<select class="form-control" name="type" required>
				<option value="" selected disabled hidden>Select</option>
				  <option value="Debit">Debit</option>
				  <option value="Credit">Credit</option>
				</select>
				<br><br>
				<label for="pin">PIN</label><br>
				<input type="password" id="pin" name="pin" required>
				<br><br>
				<button type="submit" class="btn btn-primary">Generate</button>
		</form>
@endsection