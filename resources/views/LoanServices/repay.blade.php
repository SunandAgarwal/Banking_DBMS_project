@extends ('layouts.layout')

@section ('content')
	<div class="deposit">
		<form action="/repay" method="POST">
			{{ csrf_field() }}
			<label for="type">Type Of Loan</label>
				<select class="form-control" name="type" required>
				<option value="" selected disabled hidden>Select</option>
				@foreach ($loans as $loan)
				  <option value="{{ $loan->Type }}">{{ ucfirst($loan->Type) }}</option>
				@endforeach
				</select>
				<br>

				<label for="type">Period</label>
				<select class="form-control" name="period" required>
				<option value="" selected disabled hidden>Select</option>
				@foreach ($loans as $loan)
				  <option value="{{ $loan->Period }}">{{ $loan->Period }}</option>
				@endforeach
				</select>
				<br>			

				<label for="amount">Amount</label>
				<input type="number" id="amt" name="amt" step="0.01" required>
				<br><br>

				<button type="submit" class="btn btn-primary">Repay</button>
		</form>
	</div>
@endsection