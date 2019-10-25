<div class="form-group col-md-12">

    <table class="table table-striped table-bordered table-hover table-condensed" id="reportdetailstable">
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
            @forelse($appointments as $app_details)
                <tr>
                    <td>{{ucfirst($app_details->slots->employeeservices->services->title)}}</td>
                    <td>{{ucfirst($app_details->slots->employeeservices->users->name)}}</td>
                    <td>{{$app_details->slots->employeeservices->price}}</td>
                    <td>{{$app_details->booking_date}}</td>
                    <td>{{$app_details->start_time}}</td>
                    <td>{{$app_details->slots->employeeservices->services->duration}}</td>
                    <td>{{ucfirst($app_details->booker->name)}}</td>
                </tr>
                @empty
                    <tr><td colspan="7">{{__('messages.no_reports_found_yet')}}</td></tr>
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
</div>
