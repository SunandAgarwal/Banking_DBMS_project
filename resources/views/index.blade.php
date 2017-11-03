@extends ('layouts.layout')

@section('name')
	get_the_name_from_the_database
@endsection

@section('content')
	<div>
		<div class="btn btn-block btn-lg btn-primary">Account Services</div>
		<div class="btn btn-block btn-lg btn-primary">Deposit Money</div>
		<div class="btn btn-block btn-lg btn-primary">Send Money</div>
		<div class="btn btn-block btn-lg btn-primary">Request Money</div>
		<div class="btn btn-block btn-lg btn-primary">Loan Services</div>
		<div class="btn btn-block btn-lg btn-primary">Password Management</div>
		<div class="btn btn-block btn-lg btn-primary">Transaction History</div>
	</div>
@endsection