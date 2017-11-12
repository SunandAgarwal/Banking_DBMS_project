@extends ('layouts.layout')

@section ('content')
	<h1>{{ $heading }}</h1>
		<table class="table table-hover table-bordered table-striped">
	    	<thead>
	    		<tr>
						<th>Date</th>
						<th>Time</th>
			        	<th>Type</th>
			        	<th>Debit</th>
			      		<th>Credit</th>
			      		<th>Sender Account Number</th>
			      		<th>Benificiary Account Number</th>
		    	</tr>
	    	</thead>
	    	<tbody>
	@foreach($transaction as $transaction)
		      	<tr>
		        	<td>{{ $transaction->Date }}</td>
			        <td>{{ $transaction->Time }}</td>
		        	<td>{{ $transaction->Type }}</td>
		      		<td>{{ $transaction->Debit }}</td>
		      		<td>{{ $transaction->Credit }}</td>
		      		<td>{{ $transaction->Sender_Acc_No }}</td>
		      		<td>{{ $transaction->Beneficiary_Acc_No }}</td>
		      	</tr>			  
	@endforeach
		    </tbody>
		</table>
@endsection