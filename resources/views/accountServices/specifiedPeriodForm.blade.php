@extends ('layouts.layout')

@section ('content')
	<div class="deposit">
		<form action="/specifiedPeriod" method="POST">
			{{ csrf_field() }}
				<label for="from">From</label>
				<input class="form-control" type="date" name="from" required>
				<br>
				<label for="amount">To</label>
				<input class="form-control" type="date" name="to" required>
				<br>
				<button type="submit" class="btn btn-primary">Show</button>
		</form>
	</div>
@endsection