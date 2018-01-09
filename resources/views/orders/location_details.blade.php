<table class = "table">
    <tbody>
      <thead>
        <tr>
          <td>Task</td>
          <td>Address</td>
          <td>Appointment</td>
        </tr>
      </thead>
      {{-- <tr>
        <td> Sch. at </td>
        <td> {{ $basicLocation->sch_at ?? '' }} </td>
        <td> {{ $basicLocation->sch_at ?? '' }} </td>
        <td> {{ $basicLocation->appointment_date ?? '' }} </td>
      </tr> --}}

        @forelse($addedLocation as $location)
          @php
            $arrTripAddress = $Controller->getRowTripLocation($location->trip_location_id);

            if(isset($arrTripAddress)) {
              $strTripAddress = $arrTripAddress->location_name.','.$arrTripAddress->address . ', '. $arrTripAddress->city . ', '. $arrTripAddress->state . ', '. $arrTripAddress->zip;
            } else {
              $strTripAddress = '';
            }

          @endphp
            <tr>  
              <td>{{ $Controller->getLocationWork( $location->doing_in_location ) }}</td>             
              <td>{{ $strTripAddress }} </td>
              <td>{{ $location->appointment_date }} </td>
            </tr>
        @empty
          <tr>
            <td colspan="4"> <strong>No Records</strong> </td>
          </tr>
        @endforelse

      {{-- <tr>
        <td> Terminated at </td>
        <td> {{ $basicLocation->terminated_at ?? '' }} </td>
      </tr> --}}

    </tbody>
  </table>