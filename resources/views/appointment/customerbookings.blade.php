<form action="/appointments/download/" method="POST">
    <table  id="customerbookingss" class="table table-striped table-bordered table-hover table-condensed">
        <thead>
            <th>{{__('messages.services')}}</th>
            <th>{{__('messages.employee')}}</th>
            <th>{{__('messages.price')}}</th>
            <th>{{__('messages.date')}}</th>
            <th>{{__('messages.start_time')}}</th>
            <th>{{__('messages.duration')}}</th>
            <th>{{__('messages.booked_by')}}</th>
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
                            <td colspan="7">{{__('messages.no_bookings_found')}}</td>
                        </tr>
            @endforelse
        </tbody>
        <tfoot>
            <th>{{__('messages.services')}}</th>
            <th>{{__('messages.employee')}}</th>
            <th>{{__('messages.price')}}</th>
            <th>{{__('messages.date')}}</th>
            <th>{{__('messages.start_time')}}</th>
            <th>{{__('messages.duration')}}</th>
            <th>{{__('messages.booked_by')}}</th>
        </tfoot>
    </table>
</form>
