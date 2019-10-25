<form action="/appointments/download/" method="POST">
    <table  id="customerbookingss" class="table table-striped table-bordered table-hover table-condensed">
        <thead>
            <th>{{__('Services')}}</th>
            <th>{{__('Employee')}}</th>
            <th>{{__('Price')}}</th>
            <th>{{__('Date')}}</th>
            <th>{{__('Start Time')}}</th>
            <th>{{__('Duration')}}</th>
            <th>{{__('Booked By')}}</th>
        </thead>
        <tbody>
            @forelse($booked_customers as $bookings_history)
                    @if($now > $bookings_history->booking_date)
                        <tr>
                            <td>{{ucfirst($bookings_history->slots->employeeservices->services->title)}}</td>
                            <td>{{ucfirst($bookings_history->slots->employeeservices->users->name)}}</td>
                            <td>{{$bookings_history->slots->employeeservices->price}}</td>
                            <td>{{$bookings_history->booking_date}}</td>
                            <td>{{$bookings_history->start_time}}</td>
                            <td>{{ucfirst($bookings_history->slots->employeeservices->services->duration)}}</td>
                            <td>{{ucfirst($bookings_history->booker->name)}}</td>
                        </tr>
                    @endif
                @empty
                        <tr>
                            <td colspan="7">{{__('No Bookings found.')}}</td>
                        </tr>
            @endforelse
        </tbody>
        <tfoot>
            <th>{{__('Services')}}</th>
            <th>{{__('Employee')}}</th>
            <th>{{__('Price')}}</th>
            <th>{{__('Date')}}</th>
            <th>{{__('Start Time')}}</th>
            <th>{{__('Duration')}}</th>
            <th>{{__('Booked By')}}</th>
        </tfoot>
    </table>
</form>
