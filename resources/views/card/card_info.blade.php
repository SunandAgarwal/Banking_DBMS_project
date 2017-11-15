@extends ('layouts.layout')

@section ('content')
  <h1>Card Information</h1>
  <hr>
	<table class="table table-hover table-bordered table-striped">
    <tbody>
      <tr>
        <td>Card Holder</td>
        <td>{{ $card_info->Card_Holder }}</td>
      </tr>
      <tr>
        <td>Account Number</td>
        <td>{{ $card_info->Account_Number }}</td>
      </tr>
      <tr>
        <td>Card Number</td>
        <td>{{ $card_info->Card_No }}</td>
      </tr>
      <tr>
        <td>Valid Thru</td>
        <td>{{ $card_info->Valid_Thru }}</td>
      </tr>
      <tr>
        <td>CVV</td>
        <td>{{ $card_info->CVV }}</td>
      </tr>
      <tr>
        <td>Type Of Card</td>
        <td>{{ $card_info->Type }}</td>
      </tr>
      <tr>
        <td>Status</td>
        <td>{{ $card_info->Status }}</td>
      </tr>
    </tbody>
  </table>
@endsection