@extends ('layouts.layout')

@section('content')
	<div>
		<button class="btn btn-block btn-lg btn-primary" onclick="window.location.href='accountServices'">Account Services</button>
		<button class="btn btn-block btn-lg btn-primary" onclick="window.location.href='deposit'">Deposit Money</button>
		<button class="btn btn-block btn-lg btn-primary" onclick="window.location.href='send'">Send Money</button>
		<button class="btn btn-block btn-lg btn-primary">Loan Services</button>
		<button class="btn btn-block btn-lg btn-primary" onclick="window.location.href='/transactionHistory'">Transaction History</button>
		<button class="btn btn-block btn-lg btn-primary" onclick="window.location.href='/cardServices'">Card Services</button>
	</div>
@endsection