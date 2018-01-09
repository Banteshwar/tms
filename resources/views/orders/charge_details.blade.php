
	<div class="m-portlet__body">								
		<div class="form-group m-form__group row">
			<div class="col-lg-2 col-form-label">
				<label class="col-form-label">
					Charges Entered:
				</label>
			</div>
			<div class="col-lg-10">
				<table class="table">
				
					<thead>
						<tr>
							<td>Charge Type</td>
							<td>Units</td>
							<td>Rates</td>
							<td>Amount</td>
							{{-- <td>Edit</td>
							<td>Delete</td> --}}
						</tr>

					</thead>
					@forelse($order_charge as $ocharge)
					<tr>
						<td> {{ $ocharge->charge_type }} </td>
						<td> {{ $ocharge->units }} </td>
						<td> {{ $ocharge->rates }} </td>
						<td> {{ $ocharge->amounts }} </td>
						{{-- <td> Edit </td>
						<td> Delete </td> --}}
					</tr>
					@empty
					    <tr> <td colspan="6" align="center">No Charges Added</td></tr>
					@endforelse

				</table>
			</div>
			
		</div>
	</div>