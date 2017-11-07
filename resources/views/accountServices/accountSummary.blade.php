@extends ('layouts.layout')

@section ('content')
	<table class="table table-hover table-bordered table-striped">
    <tbody>
      <tr>
        <td>Account Type </td>
        <td>{{ $account->Type }}</td>
      </tr>
      <tr>
        <td>Account Number</td>
        <td>{{ $account->Account_Number }}</td>
      </tr>
      <tr>
        <td>Current Balance</td>
        <td>{{ $account->Balance }}</td>
      </tr>

      @if($account->Cheque_Book_No != NULL)
	      <tr>
	      	<td>Cheque Book Number</td>
	      	<td>{{ $account->Cheque_Book_No }}</td>
	      </tr>
	  @endif

      <tr>
      	<td>Status</td>
      	<td>{{ $account->Status }}</td>
      </tr>
      <tr>
      	<td>Opened On</td>
      	<td>{{ $account->Registered_Time }}</td>
      </tr>
    </tbody>
  </table>
@endsection