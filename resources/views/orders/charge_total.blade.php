<table class="table">
				
	<thead>
		<tr>
			<td>Charge Type</td>
			<td>Amount</td>
			
		</tr>

	</thead>
	@php 
	 $sum = 0 ;
	@endphp
	@forelse($order_charge as $ocharge)
	@php 
	 $sum = $sum + $ocharge->amounts ;
	 @endphp
	<tr>
		<td> {{ $ocharge->charge_type }} </td>
		<td> {{ $ocharge->amounts }} </td>
	</tr>
	@empty
	    <tr> <td colspan="6" align="center">No Charges Added</td></tr>
	@endforelse
	@if($order_charge)

	<tr><td> Total </td> <td> {{$sum}} </td></tr>
	@endif

</table>