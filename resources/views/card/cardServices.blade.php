@extends('layouts.layout')

@section('content')
	@include('errors.errors')
	<div class="container">
		<button class="btn btn-primary btn-block" onclick="window.location.href='/issueCard'">
			Generate My Card
		</button>
		<button class="btn btn-primary btn-block" onclick="window.location.href='/blockCard'">
			Block My Card
		</button>
		<button class="btn btn-primary btn-block" onclick="window.location.href='/card_info'">
			Card Information
		</button>
	</div>
@endsection